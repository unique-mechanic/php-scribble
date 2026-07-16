<x-guest-layout>
    <h2 class="text-xl font-bold mb-6" style="font-family:'Orbitron',sans-serif;color:#ff006e;text-shadow:0 0 10px #ff006e;">▸ CREATE ACCOUNT</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-4">
            <label class="cyber-label block mb-1">▸ NAME</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                class="cyber-input block w-full px-4 py-2" />
            @error('name')<p class="text-pink-400 text-xs font-mono mt-1">⚠ {{ $message }}</p>@enderror
        </div>

        <div class="mb-4">
            <label class="cyber-label block mb-1">▸ EMAIL</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                class="cyber-input block w-full px-4 py-2" />
            @error('email')<p class="text-pink-400 text-xs font-mono mt-1">⚠ {{ $message }}</p>@enderror
        </div>

        <div class="mb-4">
            <label class="cyber-label block mb-1">▸ PASSWORD</label>
            <input id="password" type="password" name="password" required
                class="cyber-input block w-full px-4 py-2" />
            @error('password')<p class="text-pink-400 text-xs font-mono mt-1">⚠ {{ $message }}</p>@enderror
        </div>

        <div class="mb-6">
            <label class="cyber-label block mb-1">▸ CONFIRM PASSWORD</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required
                class="cyber-input block w-full px-4 py-2" />
        </div>

        <div class="flex items-center justify-between">
            <a href="{{ route('login') }}" class="text-cyan-400 hover:text-pink-400 text-xs transition-all">Already registered?</a>
            <button type="submit" class="btn-cyber px-6 py-2 rounded-none">➜ REGISTER</button>
        </div>
    </form>
</x-guest-layout>
