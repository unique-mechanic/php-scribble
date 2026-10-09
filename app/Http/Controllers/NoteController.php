<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class NoteController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->validate([
            'q' => ['nullable', 'string', 'max:200'],
            'notebook' => ['nullable', 'integer', 'min:0'],
            'tag' => ['nullable', 'integer', 'min:1'],
            'type' => ['nullable', Rule::in(array_keys(Note::TYPES))],
            'status' => ['nullable', Rule::in(array_keys(Note::STATUSES))],
        ]);
        $query = $request->user()->notes()->with(['tags', 'notebook']);
        if ($search = trim($filters['q'] ?? '')) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('body', 'like', "%{$search}%")
                    ->orWhere('code', 'like', "%{$search}%")
                    ->orWhereHas('tags', fn ($tags) => $tags->where('name', 'like', "%{$search}%"));
            });
        }
        if (isset($filters['notebook'])) {
            $filters['notebook'] == 0 ? $query->whereNull('notebook_id') : $query->where('notebook_id', $filters['notebook']);
        }
        if (! empty($filters['tag'])) {
            $query->whereHas('tags', fn ($tags) => $tags->where('tags.id', $filters['tag']));
        }
        foreach (['type', 'status'] as $field) {
            if (! empty($filters[$field])) {
                $query->where($field, $filters[$field]);
            }
        }
        $notes = $query->latest()->orderByDesc('id')->paginate(12)->withQueryString();
        $notebooks = $request->user()->notebooks()->orderBy('name')->get();
        $tags = $request->user()->tags()->orderBy('name')->get();
        $hasNotes = $request->user()->notes()->exists();

        return view('notes.index', compact('notes', 'notebooks', 'tags', 'filters', 'hasNotes'));
    }

    public function create(Request $request)
    {
        $request->validate(['type' => ['nullable', Rule::in(array_keys(Note::TYPES))]]);
        $type = $request->query('type') ?: 'note';

        return view('notes.create', $this->formData($request) + ['type' => $type]);
    }

    public function store(Request $request)
    {
        $data = $this->validatedNote($request);
        $note = DB::transaction(function () use ($request, $data) {
            $tags = $data['tags'] ?? [];
            unset($data['tags']);
            $note = $request->user()->notes()->create($data);
            $note->tags()->sync($tags);

            return $note;
        });

        return redirect()->route('notes.show', $note)->with('success', 'Note saved. Something useful to come back to.');
    }

    public function show(Request $request, Note $note)
    {
        abort_unless($note->user_id === $request->user()->id, 403);
        $note->load(['tags', 'notebook']);

        return view('notes.show', compact('note'));
    }

    public function edit(Request $request, Note $note)
    {
        abort_unless($note->user_id === $request->user()->id, 403);
        $note->load('tags');

        return view('notes.edit', $this->formData($request) + ['note' => $note]);
    }

    public function update(Request $request, Note $note)
    {
        abort_unless($note->user_id === $request->user()->id, 403);
        $data = $this->validatedNote($request);
        DB::transaction(function () use ($note, $data) {
            $tags = $data['tags'] ?? [];
            unset($data['tags']);
            $note->update($data);
            $note->tags()->sync($tags);
        });

        return redirect()->route('notes.show', $note)->with('success', 'Note updated.');
    }

    public function destroy(Request $request, Note $note)
    {
        abort_unless($note->user_id === $request->user()->id, 403);
        $note->delete();

        return redirect()->route('notes.index')->with('success', 'Note deleted.');
    }

    private function formData(Request $request): array
    {
        return [
            'tags' => $request->user()->tags()->orderBy('name')->get(),
            'notebooks' => $request->user()->notebooks()->orderBy('name')->get(),
        ];
    }

    private function validatedNote(Request $request): array
    {
        return $request->validate([
            'title' => ['nullable', 'string', 'max:160'],
            'body' => ['required', 'string', 'max:100000'],
            'type' => ['required', Rule::in(array_keys(Note::TYPES))],
            'status' => ['required', Rule::in(array_keys(Note::STATUSES))],
            'notebook_id' => ['nullable', 'integer', Rule::exists('notebooks', 'id')->where('user_id', $request->user()->id)],
            'source_url' => ['nullable', 'url:http,https', 'max:2048'],
            'code' => ['nullable', 'string', 'max:100000'],
            'language' => ['nullable', Rule::in(['text', 'php', 'javascript', 'sql', 'html', 'css', 'bash', 'python', 'json'])],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['integer', 'distinct', Rule::exists('tags', 'id')->where('user_id', $request->user()->id)],
        ]);
    }
}
