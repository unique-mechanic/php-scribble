<x-guest-layout>
    <h2 class="text-xl font-bold mb-6" style="font-family:'Orbitron',sans-serif;color:#ff006e;text-shadow:0 0 10px #ff006e;">▸ SYSTEM LOGIN</h2>

    <x-auth-session-status class="mb-4 text-lime-400 font-mono text-sm" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-4">
            <label class="cyber-label block mb-1">▸ EMAIL</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                class="cyber-input block w-full px-4 py-2" />
            @error('email')<p class="text-pink-400 text-xs font-mono mt-1">⚠ {{ $message }}</p>@enderror
        </div>

        <div class="mb-4">
            <label class="cyber-label block mb-1">▸ PASSWORD</label>
            <input id="password" type="password" name="password" required
                class="cyber-input block w-full px-4 py-2" />
            @error('password')<p class="text-pink-400 text-xs font-mono mt-1">⚠ {{ $message }}</p>@enderror
        </div>

        <div class="flex items-center justify-between mt-6">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-cyan-400 hover:text-pink-400 text-xs transition-all">Forgot password?</a>
            @endif
            <button type="submit" class="btn-cyber px-6 py-2 rounded-none">➜ LOGIN</button>
        </div>

        <p class="mt-4 text-xs text-gray-400 text-center">
            No account? <a href="{{ route('register') }}" class="text-cyan-400 hover:text-pink-400 transition-all">Register</a>
        </p>
    </form>
</x-guest-layout>
