@extends('layouts.cyber')
@section('title', 'Home')

@section('content')
<main class="scanlines grid-lines min-h-screen flex items-center justify-center">
    <div class="text-center px-4">
        <h1 class="text-6xl font-black glow-cyan mb-4">◆ CYBER NOTES ◆</h1>
        <p class="text-gray-400 font-mono mb-8 text-lg">Futuristic note-taking. Powered by Laravel.</p>
        <div class="flex gap-4 justify-center">
            @auth
                <a href="{{ route('notes.index') }}" class="btn-cyber px-8 py-4 rounded-none text-lg">➜ OPEN DATABASE</a>
            @else
                <a href="{{ route('login') }}" class="btn-cyber px-8 py-4 rounded-none text-lg">➜ LOGIN</a>
                <a href="{{ route('register') }}" class="px-8 py-4 rounded-none border-2 border-cyan-400 text-cyan-400 hover:border-pink-400 hover:text-pink-400 transition-all text-lg font-bold">▸ REGISTER</a>
            @endauth
        </div>
    </div>
</main>
@endsection
