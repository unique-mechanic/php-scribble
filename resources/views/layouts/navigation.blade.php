<nav class="site-nav" aria-label="Main navigation">
<div class="nav-inner">
<a class="brand" href="{{ route('home') }}"><span class="brand-mark" aria-hidden="true">&lt;/&gt;</span> Scribble</a>
<div class="nav-links">
@auth
<a class="{{ request()->routeIs('notes.*') ? 'nav-active' : '' }}" href="{{ route('notes.index') }}">My notes</a>
<a class="{{ request()->routeIs('notebooks.*') ? 'nav-active' : '' }}" href="{{ route('notebooks.index') }}">Notebooks</a>
<a class="{{ request()->routeIs('profile.*') ? 'nav-active' : '' }}" href="{{ route('profile.edit') }}">Settings</a>
<form method="POST" action="{{ route('logout') }}">@csrf<button class="nav-logout" type="submit">Log out</button></form>
@else
<a href="{{ route('login') }}">Log in</a>
<a class="button button-small" href="{{ route('register') }}">Get started</a>
@endauth
<x-theme-toggle />
</div>
</div>
</nav>
