@extends('layouts.notebook')
@section('title', 'Notebooks')
@section('content')
<div class="page-heading"><p class="eyebrow">Library / Collections</p><h1>Give your ideas a home.</h1><p class="muted">One notebook for each language, project, or rabbit hole.</p></div>
<div class="notebook-workspace">
<section class="surface notebook-create"><div class="section-icon" aria-hidden="true">+</div><h2>Start a new chapter</h2><p class="muted text-sm mt-2 mb-6">A little structure for the things you're figuring out.</p><form method="POST" action="{{ route('notebooks.store') }}">@csrf<label class="field-label" for="name">Notebook name</label><input class="text-field w-full" id="name" name="name" value="{{ old('name') }}" placeholder="Laravel, SQL, Weekend project…" maxlength="100" required><x-input-error :messages="$errors->get('name')" class="mt-2"/><button class="button mt-5 w-full" type="submit">Create notebook</button></form><p class="notebook-hint">Tip: organize by what you're building or learning. Use tags for ideas that cross subjects.</p></section>
<section aria-label="Your notebooks"><div class="library-results"><div><h2>Your notebooks</h2><span>{{ $notebooks->count() }} collections</span></div></div><div class="notebook-collection-grid">
@forelse($notebooks as $notebook)
<a class="surface notebook-cover" href="{{ route('notes.index', ['notebook' => $notebook->id]) }}"><div class="notebook-cover-mark" aria-hidden="true">▤</div><h2>{{ $notebook->name }}</h2><div class="heading-row"><p class="muted text-xs">{{ $notebook->notes_count }} {{ Str::plural('note', $notebook->notes_count) }}</p><span aria-hidden="true">↗</span></div></a>
@empty
<div class="surface notebook-empty"><span class="section-icon" aria-hidden="true">▤</span><h2>The first page is yours.</h2><p class="muted mt-3 text-sm">Create a notebook to collect your explanations, snippets, and solutions in one place.</p></div>
@endforelse
</div><a class="unfiled-link" href="{{ route('notes.index', ['notebook' => 0]) }}"><span aria-hidden="true">↳</span> Browse unfiled notes <span aria-hidden="true">↗</span></a></section>
</div>
@endsection
