@extends('layouts.cyber')
@section('title', 'Create Note')

@section('content')
<main class="scanlines grid-lines min-h-screen">
    <div class="mx-auto max-w-2xl py-12 px-4">
        <div class="mb-6">
            <h2 class="text-3xl font-bold glow-magenta mb-2">▸ CREATE NOTE</h2>
            <div class="h-1 w-40 bg-gradient-to-r from-pink-600 to-transparent"></div>
        </div>

        <div class="skill-card p-8 rounded-none">
            <form method="POST" action="{{ route('notes.store') }}">
                @csrf
                <div class="mb-6">
                    <label class="skill-stat block mb-2">▸ NOTE CONTENT</label>
                    <textarea
                        name="body"
                        rows="8"
                        class="cyber-input w-full p-4 rounded-none resize-none @error('body') border-pink-500 @enderror"
                        placeholder="Enter your note here..."
                    >{{ old('body') }}</textarea>
                    @error('body')
                        <p class="text-pink-400 text-xs font-mono mt-2">⚠ {{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="skill-stat block mb-2">▸ TAGS (Optional)</label>
                    <div class="cyber-input p-4 rounded-none bg-gray-900 border-2 border-cyan-600">
                        @if($tags->count())
                            <div class="space-y-2">
                                @foreach($tags as $tag)
                                    <label class="flex items-center cursor-pointer hover:text-cyan-400 transition-colors">
                                        <input 
                                            type="checkbox" 
                                            name="tags[]" 
                                            value="{{ $tag->id }}"
                                            class="w-4 h-4 mr-3"
                                        >
                                        <span class="font-mono text-sm">{{ $tag->name }}</span>
                                    </label>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500 text-sm font-mono">No tags yet. Create one in your profile.</p>
                        @endif
                    </div>
                </div>
                <div class="flex gap-4">
                    <button type="submit" class="btn-cyber px-6 py-3 rounded-none flex-1">➜ TRANSMIT NOTE</button>
                    <a href="{{ route('notes.index') }}" class="px-6 py-3 rounded-none border-2 border-gray-600 text-gray-400 hover:border-cyan-400 hover:text-cyan-400 transition-all text-center">✕ CANCEL</a>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection
