@extends('layouts.notebook')
@section('title', 'My notes')
@section('content')


<section aria-label="Your notes">
<div class="library-heading"><div><p class="eyebrow">Your personal knowledge base</p><h1>A place for your next <span>aha.</span></h1><p class="muted">Capture the small things that make you a better builder.</p></div><a class="button new-note-button" href="{{ route('notes.create') }}"><span aria-hidden="true">+</span> New note</a></div>
<div class="capture-strip"><div class="capture-label"><span class="capture-dot"></span> Start with an idea</div><a href="{{ route('notes.create', ['type'=>'concept']) }}"><span aria-hidden="true">{ }</span> Explain a concept <span class="capture-arrow">↗</span></a><a href="{{ route('notes.create', ['type'=>'howto']) }}"><span aria-hidden="true">↳</span> Write a how-to <span class="capture-arrow">↗</span></a><a href="{{ route('notes.create', ['type'=>'solution']) }}"><span aria-hidden="true">⌘</span> Save a solution <span class="capture-arrow">↗</span></a></div>
<form class="library-search" method="GET" action="{{ route('notes.index') }}">
<div class="library-search-row"><div class="search-input-wrap"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><circle cx="10.5" cy="10.5" r="6.5"/><path d="m16 16 5 5"/></svg><label class="sr-only" for="q">Find something useful</label><input class="text-field w-full" id="q" name="q" value="{{ $filters['q'] ?? '' }}" placeholder="Search your knowledge…" maxlength="200"></div><button class="button-secondary" type="submit">Search</button></div>
<details class="library-filters" @if(collect($filters)->except('q')->filter(fn($value) => $value !== null && $value !== '')->isNotEmpty()) open @endif><summary><span aria-hidden="true">≡</span> Filters <span class="filter-hint">Notebook, tag, type & status</span></summary>
<div class="search-filters">
<div><label class="field-label" for="notebook">Notebook</label><select class="text-field w-full" name="notebook" id="notebook"><option value="">All notebooks</option><option value="0" @selected(isset($filters['notebook']) && $filters['notebook'] == 0)>Without a notebook</option>@foreach($notebooks as $notebook)<option value="{{ $notebook->id }}" @selected(($filters['notebook'] ?? '') == $notebook->id)>{{ $notebook->name }}</option>@endforeach</select></div>
<div><label class="field-label" for="tag">Tag</label><select class="text-field w-full" name="tag" id="tag"><option value="">All tags</option>@foreach($tags as $tag)<option value="{{ $tag->id }}" @selected(($filters['tag'] ?? '') == $tag->id)>{{ $tag->name }}</option>@endforeach</select></div>
<div><label class="field-label" for="type">Note type</label><select class="text-field w-full" name="type" id="type"><option value="">All types</option>@foreach(\App\Models\Note::TYPES as $value => $label)<option value="{{ $value }}" @selected(($filters['type'] ?? '') === $value)>{{ $label }}</option>@endforeach</select></div>
<div><label class="field-label" for="status">Learning status</label><select class="text-field w-full" name="status" id="status"><option value="">All notes</option>@foreach(\App\Models\Note::STATUSES as $value => $label)<option value="{{ $value }}" @selected(($filters['status'] ?? '') === $value)>{{ $label }}</option>@endforeach</select></div>
</div>
</details>
@if($errors->any())<p class="field-error">{{ $errors->first() }}</p>@endif
</form>
<div class="library-results"><div><h2>{{ empty($filters) ? 'Your notes' : 'Search results' }}</h2><span>{{ $notes->total() }} {{ Str::plural('note', $notes->total()) }} found</span></div>@if(!empty($filters))<a class="text-link text-sm" href="{{ route('notes.index') }}">Clear filters</a>@else<span class="sort-caption">Latest first <span aria-hidden="true">↓</span></span>@endif</div>
@if($notes->isNotEmpty())
<div class="notes-grid">
@foreach($notes as $note)
<a class="note-card library-card" data-kind="{{ $note->type }}" href="{{ route('notes.show', $note) }}"><div class="card-topline"><span class="card-symbol" aria-hidden="true">{{ ["note" => "✎", "concept" => "{ }", "howto" => "↳", "solution" => "⌘"][$note->type] ?? "✎" }}</span><span class="note-kind">{{ \App\Models\Note::TYPES[$note->type] ?? 'Free note' }}</span><span class="note-date mb-0">{{ $note->created_at?->format('j M Y') ?? 'Date unavailable' }}</span></div><h2>{{ $note->title ?: Str::limit($note->body, 65) }}</h2><p class="note-preview">{{ Str::limit($note->body, 150) }}</p><div class="sample-tags mb-5">@foreach($note->tags as $tag)<span class="tag">{{ $tag->name }}</span>@endforeach</div><span class="note-bottom"><span>{{ $note->notebook?->name ?? 'Unfiled' }}</span><span class="card-status">{{ $note->status === "learning" ? "Learning" : "Reference" }} <span aria-hidden="true">↗</span></span></span></a>
@endforeach
</div>
<div class="mt-8">{{ $notes->links() }}</div>
@else
<div class="surface empty-state"><span class="empty-mark" aria-hidden="true">✎</span><h2>{{ $hasNotes ? 'Nothing matches just yet.' : 'Your next idea starts here.' }}</h2><p class="muted">{{ $hasNotes ? 'Try a different search or clear your filters.' : 'Save an explanation, a useful how-to, or a solution you want to remember.' }}</p>@if($hasNotes)<a class="button-secondary mt-6" href="{{ route('notes.index') }}">Clear filters</a>@else<a class="button mt-6" href="{{ route('notes.create') }}">Write your first note</a>@endif</div>
@endif
</section>
@endsection
