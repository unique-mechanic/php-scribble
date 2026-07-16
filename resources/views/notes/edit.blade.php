@extends('layouts.cyber')
@section('title', 'Edit Note')

@section('content')
<main class="scanlines grid-lines min-h-screen">
    <div class="mx-auto max-w-2xl py-12 px-4">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h2 class="text-3xl font-bold glow-magenta mb-2">▸ EDIT NOTE #{{ $note->id }}</h2>
                <div class="h-1 w-40 bg-gradient-to-r from-pink-600 to-transparent"></div>
            </div>
            <a href="{{ route('notes.show', $note) }}" class="text-cyan-400 hover:text-pink-400 text-sm transition-all">← BACK</a>
        </div>

        <div class="skill-card p-8 rounded-none">
            <form method="POST" action="{{ route('notes.update', $note) }}">
                @csrf
                @method('PATCH')
                <div class="mb-6">
                    <label class="skill-stat block mb-2">▸ NOTE CONTENT</label>
                    <textarea
                        name="body"
                        rows="8"
                        class="cyber-input w-full p-4 rounded-none resize-none @error('body') border-pink-500 @enderror"
                    >{{ old('body', $note->body) }}</textarea>
                    @error('body')
                        <p class="text-pink-400 text-xs font-mono mt-2">⚠ {{ $message }}</p>
                    @enderror
                </div>
                <div class="flex gap-4">
                    <button type="submit" class="btn-cyber px-6 py-3 rounded-none flex-1">➜ UPDATE NOTE</button>
                    <a href="{{ route('notes.show', $note) }}" class="px-6 py-3 rounded-none border-2 border-gray-600 text-gray-400 hover:border-cyan-400 hover:text-cyan-400 transition-all text-center">✕ CANCEL</a>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection
