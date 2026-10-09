<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>@include('layouts.head')</head>
<body class="auth-page">
<div class="guest-theme-toggle"><x-theme-toggle /></div>
<main class="auth-layout">
<section class="auth-story"><a class="brand" href="{{ route('home') }}"><span class="brand-mark" aria-hidden="true">&lt;/&gt;</span> Scribble</a><div><p class="eyebrow">A workspace for curious minds</p><h2>Small notes.<br>Big <span>aha moments.</span></h2><p>The fix you finally found. The concept that clicked. Your own words, ready when you need them.</p><div class="auth-example"><span class="auth-example-label">// a note to my future self</span><p>Start with the relationship.</p><code>$user-&gt;notes()-&gt;latest()-&gt;get();</code><span class="tag">Laravel</span> <span class="tag">Concept</span></div></div><p class="auth-story-footer">Learn. Save. Build.</p></section>
<section class="auth-shell"><div class="surface auth-card">{{ $slot }}</div><a class="back-link" href="{{ route('home') }}">← Back to Scribble</a></section>
</main>
</body>
</html>
