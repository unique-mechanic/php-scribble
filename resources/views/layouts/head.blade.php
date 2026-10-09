<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
@php($pageTitle = match(request()->route()?->getName()) { 'profile.edit' => 'Settings', 'login' => 'Log in', 'register' => 'Create account', 'password.request' => 'Forgot password', 'password.reset' => 'Reset password', 'password.confirm' => 'Confirm password', 'verification.notice' => 'Verify email', default => 'Your notes' })
<title>@yield('title', $pageTitle) · Scribble</title>
<script>
    // Apply the saved theme before styles load to avoid a flash of the wrong theme.
    (() => {
        let preference = null;
        try {
            const saved = localStorage.getItem('scribble-theme');
            if (saved === 'light' || saved === 'dark') preference = saved;
        } catch (_) {}
        window.scribbleThemePreference = preference;
        const theme = preference ?? (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
        document.documentElement.dataset.theme = theme;
        document.documentElement.style.colorScheme = theme;
    })();
</script>
@vite(['resources/css/app.css', 'resources/js/app.js'])
