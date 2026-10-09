@extends('layouts.notebook')
@section('title', 'Edit note')
@section('content')
<div class="editor-shell compose-shell"><div class="document-toolbar"><a class="back-link" href="{{ route('notes.show', $note) }}">← Back to note</a><button class="button-secondary button-small" type="button" @click="focused = !focused" :aria-pressed="focused" x-text="focused ? 'Exit focus' : 'Focus mode'">Focus mode</button></div><div class="page-heading"><p class="eyebrow">Refine / Your knowledge</p><h1>Another layer of understanding.</h1><p class="muted">Keep what works. Clarify what changed.</p></div>@include('notes.form')</div>
@endsection
