<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>@include('layouts.head')</head>
<body x-data="{ focused: false }" :class="{ 'workspace-focused': focused }">
<a class="skip-link" href="#main">Skip to content</a>
@include('layouts.navigation')
@php($workspace = auth()->check() && !request()->routeIs('home'))
<main id="main" class="page-shell {{ $workspace ? 'workspace-shell' : '' }}">
@if($workspace)<div class="library-layout">@include('layouts.workspace-sidebar')<div class="library-main">@endif
@if(session('success'))<div class="notice" role="status">{{ session('success') }}</div>@endif
@isset($header)<div class="page-heading">{{ $header }}</div>@endisset
@yield('content')
{{ $slot ?? '' }}
@if($workspace)</div></div>@endif
</main>
<footer class="site-footer">Scribble · Learn. Save. Build.</footer>
@stack('scripts')
</body>
</html>
