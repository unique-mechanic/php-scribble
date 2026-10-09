<x-guest-layout>
<p class="eyebrow">Pick up where you left off</p>
<h1 class="auth-title">Welcome back.</h1>
<p class="muted mb-6">Your thoughts are right where you left them.</p>
<x-auth-session-status class="mb-4" :status="session('status')" />
<form method="POST" action="{{ route('login') }}">
@csrf
<div class="mb-4"><x-input-label for="email" value="Email" /><x-text-input id="email" name="email" type="email" autocomplete="email" class="block mt-1 w-full" :value="old('email')" required autofocus /><x-input-error :messages="$errors->get('email')" class="mt-2" /></div>
<div class="mb-4"><x-input-label for="password" value="Password" /><x-text-input id="password" name="password" type="password" autocomplete="current-password" class="block mt-1 w-full" required /><x-input-error :messages="$errors->get('password')" class="mt-2" /></div>
<label class="remember-me"><input type="checkbox" name="remember"> Remember me</label><div class="mb-6"><a class="text-link text-sm" href="{{ route('password.request') }}">Forgot password?</a></div>
<button class="button w-full" type="submit">Log in</button></form>
<p class="auth-switch">New to Scribble? <a class="text-link" href="{{ route('register') }}">Create an account</a></p>
</x-guest-layout>
