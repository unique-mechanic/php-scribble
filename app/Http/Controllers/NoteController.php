<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::where('user_id', Auth::id())->latest()->get();
        return view('notes.index', compact('notes'));
    }

    public function create()
    {
        $tags = Auth::user()->tags;
        return view('notes.create', compact('tags'));
    }

    public function store(Request $request)
    {
        $request->validate(['body' => 'required|string|min:1']);

        $note = Note::create([
            'body'    => $request->body,
            'user_id' => Auth::id(),
        ]);

        // Sync tags (if any were selected)
        if ($request->has('tags')) {
            $note->tags()->sync($request->tags);
        }

        return redirect()->route('notes.index')->with('success', 'Note created successfully!');
    }

    public function show(Note $note)
    {
        abort_if($note->user_id !== Auth::id(), 403);
        return view('notes.show', compact('note'));
    }

    public function edit(Note $note)
    {
        abort_if($note->user_id !== Auth::id(), 403);
        $tags = Auth::user()->tags;
        return view('notes.edit', compact('note', 'tags'));
    }

    public function update(Request $request, Note $note)
    {
        abort_if($note->user_id !== Auth::id(), 403);
        $request->validate(['body' => 'required|string|min:1']);

        $note->update(['body' => $request->body]);

        // Sync tags (if any were selected)
        if ($request->has('tags')) {
            $note->tags()->sync($request->tags);
        }

        return redirect()->route('notes.show', $note)->with('success', 'Note updated successfully!');
    }

    public function destroy(Note $note)
    {
        abort_if($note->user_id !== Auth::id(), 403);
        $note->delete();

        return redirect()->route('notes.index')->with('success', 'Note deleted successfully!');
    }
}
