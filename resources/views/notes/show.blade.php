@extends('layouts.cyber')
@section('title', 'View Note')

@section('content')
<main class="scanlines grid-lines min-h-screen">
    <div class="mx-auto max-w-3xl py-12 px-4">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h2 class="text-3xl font-bold glow-magenta mb-2">▸ NOTE #{{ $note->id }}</h2>
                <div class="h-1 w-40 bg-gradient-to-r from-pink-600 to-transparent"></div>
            </div>
            <a href="{{ route('notes.index') }}" class="text-cyan-400 hover:text-pink-400 text-sm transition-all">← BACK</a>
        </div>

        <div class="skill-card p-8 rounded-none mb-6">
            <p class="text-green-400 font-mono leading-relaxed whitespace-pre-wrap">{{ $note->body }}</p>

            <div class="border-t border-cyan-400 mt-6 pt-4 grid grid-cols-3 gap-4 text-xs">
                <div>
                    <div class="skill-stat">LENGTH</div>
                    <div class="skill-stat-value">{{ strlen($note->body) }} chars</div>
                </div>
                <div>
                    <div class="skill-stat">CREATED</div>
                    <div class="skill-stat-value">{{ $note->created_at->format('d M Y') }}</div>
                </div>
                <div>
                    <div class="skill-stat">UPDATED</div>
                    <div class="skill-stat-value">{{ $note->updated_at->format('d M Y') }}</div>
                </div>
            </div>
        </div>

        <div class="flex gap-4">
            <a href="{{ route('notes.edit', $note) }}" class="btn-cyber px-6 py-3 rounded-none flex-1 text-center">✎ EDIT NOTE</a>
            <form method="POST" action="{{ route('notes.destroy', $note) }}" onsubmit="return confirm('Delete this note permanently?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-danger px-6 py-3 rounded-none">✕ DELETE</button>
            </form>
        </div>
    </div>
</main>
@endsection
