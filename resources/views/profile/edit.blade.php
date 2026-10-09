<x-app-layout>
<x-slot name="header"><p class="eyebrow">Workspace / Preferences</p><h1>Make yourself at home.</h1><p class="muted">The details that keep your workspace yours.</p></x-slot>
<div class="settings-jump-links"><a href="#account">Account</a><a href="#tags">Tags</a><a href="#security">Security</a><a href="#danger">Danger zone</a></div>
<div class="settings-stack">
@foreach(['account' => ['01', 'Your account', 'update-profile-information-form'], 'tags' => ['02', 'Organize with tags', 'manage-tags-form'], 'security' => ['03', 'Keep it secure', 'update-password-form'], 'danger' => ['04', 'Danger zone', 'delete-user-form']] as $id => [$number, $label, $partial])
<div class="settings-section" id="{{ $id }}"><div class="settings-caption"><span>{{ $number }}</span><h2>{{ $label }}</h2></div><div class="surface settings-card">@include('profile.partials.' . $partial)</div></div>
@endforeach
</div>
</x-app-layout>
