@php($filters = $filters ?? [])
@php($sidebarNotebooks = auth()->user()->notebooks()->orderBy('name')->get())
<aside class="library-sidebar" aria-label="Note collections">
<div class="sidebar-intro"><span class="workspace-avatar" aria-hidden="true">{{ Str::upper(Str::substr(auth()->user()->name, 0, 1)) }}</span><div><strong>Your workspace</strong><span>One idea at a time.</span></div></div>
<p class="sidebar-label">LIBRARY</p>
<a class="collection-link {{ request()->routeIs('notes.index') && empty($filters) ? 'selected' : '' }}" href="{{ route('notes.index') }}"><span aria-hidden="true">▦</span> All notes <span class="collection-arrow">↗</span></a>
<a class="collection-link {{ ($filters['status'] ?? '') === 'learning' ? 'selected' : '' }}" href="{{ route('notes.index', ['status' => 'learning']) }}"><span aria-hidden="true">◷</span> Still learning</a>
<a class="collection-link {{ ($filters['status'] ?? '') === 'reference' ? 'selected' : '' }}" href="{{ route('notes.index', ['status' => 'reference']) }}"><span aria-hidden="true">✓</span> Reference shelf</a>
<div class="sidebar-section-heading"><p class="sidebar-label">NOTEBOOKS</p><a href="{{ route('notebooks.index') }}" aria-label="Manage notebooks">+</a></div>
@forelse($sidebarNotebooks as $notebook)
<a class="collection-link {{ ($filters['notebook'] ?? '') == $notebook->id ? 'selected' : '' }}" href="{{ route('notes.index', ['notebook' => $notebook->id]) }}"><span class="notebook-dot" aria-hidden="true"></span><span class="collection-name">{{ $notebook->name }}</span></a>
@empty
<p class="sidebar-empty">Give your ideas a home.</p><a class="sidebar-create" href="{{ route('notebooks.index') }}">Create a notebook ↗</a>
@endforelse
<div class="sidebar-section-heading"><p class="sidebar-label">WORKSPACE</p></div><a class="collection-link {{ request()->routeIs('notebooks.*') ? 'selected' : '' }}" href="{{ route('notebooks.index') }}"><span aria-hidden="true">▤</span> Notebooks</a><a class="collection-link {{ request()->routeIs('profile.*') ? 'selected' : '' }}" href="{{ route('profile.edit') }}"><span aria-hidden="true">⚙</span> Settings</a><div class="sidebar-tip"><span aria-hidden="true">&lt;/&gt;</span><strong>Build your own knowledge.</strong><p>The explanation that clicks. The fix that works. Keep them here.</p></div>
</aside>