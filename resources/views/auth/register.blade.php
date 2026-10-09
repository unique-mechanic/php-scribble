<x-guest-layout>
<p class="eyebrow">Your next chapter</p>
<h1 class="auth-title">Make room for ideas.</h1>
<p class="muted mb-6">Create your account and start your notebook.</p>
<x-auth-session-status class="mb-4" :status="session('status')" />
<form method="POST" action="{{ route('register') }}">
@csrf
<div class="mb-4"><x-input-label for="name" value="Name" /><x-text-input id="name" name="name" type="text" autocomplete="name" class="block mt-1 w-full" :value="old('name')" required autofocus /><x-input-error :messages="$errors->get('name')" class="mt-2" /></div>
<div class="mb-4"><x-input-label for="email" value="Email" /><x-text-input id="email" name="email" type="email" autocomplete="email" class="block mt-1 w-full" :value="old('email')" required /><x-input-error :messages="$errors->get('email')" class="mt-2" /></div>
<div class="mb-4"><x-input-label for="password" value="Password" /><x-text-input id="password" name="password" type="password" autocomplete="new-password" class="block mt-1 w-full" required /><x-input-error :messages="$errors->get('password')" class="mt-2" /></div>
<div class="mb-4"><x-input-label for="password_confirmation" value="Confirm password" /><x-text-input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" class="block mt-1 w-full" required /><x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" /></div>
<button class="button w-full" type="submit">Create account</button></form>
<p class="auth-switch">Already have an account? <a class="text-link" href="{{ route('login') }}">Log in</a></p>
</x-guest-layout>
