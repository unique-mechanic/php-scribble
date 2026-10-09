@extends('layouts.notebook')
@section('title', 'A little space for your thoughts')
@section('content')
<section class="welcome-grid">
<div>
<p class="eyebrow">Built for what you learn and build</p>
<h1>Good ideas deserve<br>a <span class="welcome-accent">second life.</span></h1>
<p class="welcome-description">Save explanations, useful how-tos, and fixes that worked. Find them when you need them, and pick up where you left off.</p>
<div class="actions">
@auth
<a class="button" href="{{ route('notes.index') }}">Open my notes <span aria-hidden="true">→</span></a>
@else
<a class="button" href="{{ route('register') }}">Start your notebook <span aria-hidden="true">→</span></a>
<a class="text-link" href="{{ route('login') }}">Already have an account? Log in</a>
@endauth
</div>
<p class="muted mt-6 text-sm">Your explanations. Your snippets. Your next breakthrough.</p>
</div>
<div class="sample-stack" aria-label="Example note">
<article class="sample-note">
<div class="editor-chrome" aria-hidden="true"><span class="chrome-dot"></span><span class="chrome-dot"></span><span class="chrome-dot"></span><span class="editor-tab">eloquent-relationships.md</span></div>
<div class="sample-content">
<p class="eyebrow">A concept worth keeping</p>
<h2>One user. Many notes.</h2>
<p>Use a relationship to start with a user's notes, then add the conditions you need.</p>
<div class="sample-code" aria-label="Example Eloquent query"><code><span class="sample-code-line"><span class="syntax-variable">$notes</span> = <span class="syntax-variable">$user</span>-&gt;<span class="syntax-method">notes</span>()</span><span class="sample-code-line">    -&gt;<span class="syntax-method">where</span>(<span class="syntax-string">'status'</span>, <span class="syntax-string">'learning'</span>)</span><span class="sample-code-line">    -&gt;<span class="syntax-method">latest</span>()-&gt;<span class="syntax-method">get</span>();</span></code></div>
<p>A short explanation. An example that works. Something to come back to on your next project.</p>
<div class="sample-tags"><span class="tag">Laravel</span><span class="tag">Eloquent</span><span class="tag">Concept</span></div>
</div>
</article>
</div>
</section>
<div class="welcome-features"><div class="welcome-feature-heading"><p class="eyebrow">A small system for better learning</p><h2>Less searching. More building.</h2></div><div><h3>Capture simply</h3><p>A clear page and room to think.</p></div><div><h3>Organize your learning</h3><p>Notebooks and tags for each subject or project.</p></div><div><h3>Find your next step</h3><p>Revisit what you are still learning.</p></div></div>
@endsection
