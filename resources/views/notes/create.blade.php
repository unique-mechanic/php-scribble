@extends('layouts.notebook')
@section('title', 'New note')
@section('content')
<div class="editor-shell compose-shell" x-data="{ dirty: false }" @input="dirty = true">
<div class="document-toolbar"><a class="back-link" href="{{ route('notes.index') }}">← Library</a><button class="button-secondary button-small" type="button" @click="focused = !focused" :aria-pressed="focused" x-text="focused ? 'Exit focus' : 'Focus mode'">Focus mode</button></div>
<div class="page-heading"><p class="eyebrow">Capture / {{ \App\Models\Note::TYPES[$type] }}</p><h1>Make it click.</h1><p class="muted">A thought, an explanation, a fix. Write it for your future self.</p></div>
<div class="template-options mb-6">@foreach(\App\Models\Note::TYPES as $value => $label)<a @click="if (dirty &amp;&amp; !confirm('Switch templates and discard this unsaved draft?')) $event.preventDefault()" class="template-option {{ $type === $value ? 'selected' : '' }}" href="{{ route('notes.create', ['type' => $value]) }}" @if($type === $value) aria-current="page" @endif><span aria-hidden="true">{{ ['note'=>'✎','concept'=>'{ }','howto'=>'↳','solution'=>'⌘'][$value] }}</span>{{ $label }}</a>@endforeach</div>
@include('notes.form')
</div>
@endsection
