<!doctype html>
<html lang="en" class="h-full" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CyberNotes - @yield('title', 'Futuristic Note Taking')</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.11.1/dist/full.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Space Mono', monospace; }
        h1,h2,h3,h4,h5,h6 { font-family: 'Orbitron', sans-serif; text-shadow: 0 0 10px rgba(0,255,255,0.5); letter-spacing: 0.1em; }
        body { background: linear-gradient(135deg, #0a0e27 0%, #1a0033 50%, #0a0e27 100%); background-attachment: fixed; color: #00ff41; }

        .neon-border { border: 2px solid #00d9ff; box-shadow: 0 0 10px rgba(0,217,255,0.5), inset 0 0 10px rgba(0,217,255,0.1); }
        .neon-border-magenta { border: 2px solid #ff006e; box-shadow: 0 0 10px rgba(255,0,110,0.5), inset 0 0 10px rgba(255,0,110,0.1); }
        .glow-cyan { text-shadow: 0 0 10px #00ff41, 0 0 20px #00d9ff; color: #00ff41; }
        .glow-magenta { text-shadow: 0 0 10px #ff006e, 0 0 20px #c71585; color: #ff006e; }

        .btn-cyber { background: linear-gradient(135deg, #00d9ff, #00ff41); color: #0a0e27; border: 2px solid #00ff41; font-weight: bold; text-transform: uppercase; letter-spacing: 0.1em; box-shadow: 0 0 10px rgba(0,255,65,0.5); transition: all 0.3s ease; }
        .btn-cyber:hover { background: linear-gradient(135deg, #00ff41, #ff006e); box-shadow: 0 0 20px rgba(255,0,110,0.8); transform: scale(1.05); }
        .btn-danger { background: linear-gradient(135deg, #ff006e, #c71585); color: #fff; border: 2px solid #ff006e; font-weight: bold; text-transform: uppercase; letter-spacing: 0.1em; box-shadow: 0 0 10px rgba(255,0,110,0.5); transition: all 0.3s ease; }
        .btn-danger:hover { box-shadow: 0 0 20px rgba(255,0,110,0.9); transform: scale(1.05); }

        .scanlines { position: relative; overflow: hidden; }
        .scanlines::after { content: ""; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: repeating-linear-gradient(0deg, rgba(0,0,0,0.15), rgba(0,0,0,0.15) 1px, transparent 1px, transparent 2px); pointer-events: none; z-index: 1; }

        .skills-sidebar { background: rgba(10,14,39,0.9); border-right: 3px solid #00d9ff; box-shadow: inset -10px 0 20px rgba(0,217,255,0.1); }
        .skill-category { padding: 12px 16px; border-left: 4px solid transparent; cursor: pointer; transition: all 0.3s ease; }
        .skill-category:hover { border-left-color: #00ff41; background: rgba(0,255,65,0.1); transform: translateX(4px); }
        .skill-category.active { border-left-color: #ff006e; background: rgba(255,0,110,0.15); box-shadow: inset 0 0 10px rgba(255,0,110,0.3); }
        .skill-bar { width: 100%; height: 4px; background: rgba(0,217,255,0.2); border: 1px solid #00d9ff; margin-top: 6px; overflow: hidden; }
        .skill-bar-fill { height: 100%; background: linear-gradient(90deg, #00d9ff, #00ff41); box-shadow: 0 0 10px rgba(0,255,65,0.8); }

        .skill-card { background: rgba(10,14,39,0.85); border: 2px solid #00d9ff; box-shadow: 0 0 15px rgba(0,217,255,0.3), inset 0 0 15px rgba(0,217,255,0.05); transition: all 0.4s ease; position: relative; overflow: hidden; }
        .skill-card::before { content: ""; position: absolute; top: 0; left: 0; right: 0; height: 3px; background: linear-gradient(90deg, transparent, #ff006e, transparent); opacity: 0; animation: topGlow 2s ease-in-out infinite; }
        @keyframes topGlow { 0%,100% { opacity: 0; } 50% { opacity: 1; } }
        .skill-card:hover { border-color: #ff006e; box-shadow: 0 0 25px rgba(255,0,110,0.6), inset 0 0 20px rgba(255,0,110,0.1); transform: translateY(-8px) scale(1.02); }
        .skill-stat { font-size: 0.75rem; color: #00d9ff; font-weight: bold; font-family: 'Space Mono', monospace; text-transform: uppercase; letter-spacing: 0.1em; }
        .skill-stat-value { color: #00ff41; text-shadow: 0 0 5px rgba(0,255,65,0.8); }
        .total-stats { background: rgba(10,14,39,0.9); border: 2px solid #00ff41; box-shadow: 0 0 15px rgba(0,255,65,0.3); }

        .grid-lines { background-image: linear-gradient(0deg, transparent 24%, rgba(0,217,255,0.05) 25%, rgba(0,217,255,0.05) 26%, transparent 27%, transparent 74%, rgba(0,217,255,0.05) 75%, rgba(0,217,255,0.05) 76%, transparent 77%, transparent), linear-gradient(90deg, transparent 24%, rgba(0,217,255,0.05) 25%, rgba(0,217,255,0.05) 26%, transparent 27%, transparent 74%, rgba(0,217,255,0.05) 75%, rgba(0,217,255,0.05) 76%, transparent 77%, transparent); background-size: 50px 50px; }

        .cyber-input { background: rgba(10,14,39,0.9) !important; border: 2px solid #00d9ff !important; color: #00ff41 !important; font-family: 'Space Mono', monospace !important; }
        .cyber-input:focus { border-color: #ff006e !important; box-shadow: 0 0 15px rgba(255,0,110,0.5) !important; outline: none !important; }
        .cyber-input::placeholder { color: rgba(0,217,255,0.4) !important; }
    </style>
</head>
<body class="h-full">

{{-- NAVBAR --}}
<nav class="neon-border border-b-2 bg-opacity-20 backdrop-blur-md sticky top-0 z-50">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <a href="{{ route('home') }}">
                    <h1 class="text-2xl font-bold glow-cyan">◆ CYBER NOTES ◆</h1>
                </a>
                <div class="hidden md:block ml-10">
                    <div class="flex items-baseline space-x-6">
                        <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-cyan-400 border-b-2 border-cyan-400' : 'text-gray-400 hover:text-cyan-400' }} px-3 py-2 text-sm font-medium transition-all duration-300">▸ HOME</a>
                        @auth
                        <a href="{{ route('notes.index') }}" class="{{ request()->routeIs('notes.*') ? 'text-cyan-400 border-b-2 border-cyan-400' : 'text-gray-400 hover:text-cyan-400' }} px-3 py-2 text-sm font-medium transition-all duration-300">▸ NOTES</a>
                        @endauth
                    </div>
                </div>
            </div>
            <div class="hidden md:flex items-center gap-4">
                @auth
                    <span class="text-cyan-400 text-xs font-mono">[USER: {{ auth()->user()->email }}]</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-cyan-400 hover:text-pink-400 px-3 py-2 text-sm transition-all duration-300">▸ LOGOUT</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-cyan-400 hover:text-pink-400 px-3 py-2 text-sm font-medium transition-all">▸ LOGIN</a>
                    <a href="{{ route('register') }}" class="btn-cyber px-4 py-2 text-sm">▸ REGISTER</a>
                @endauth
            </div>
        </div>
    </div>
</nav>

{{-- FLASH MESSAGES --}}
@if(session('success'))
<div id="flash-msg" class="mx-auto max-w-7xl px-4 pt-4">
    <div class="p-4 border-2 border-lime-400 bg-lime-900 bg-opacity-10 text-lime-400 font-mono text-sm">
        ✓ {{ session('success') }}
    </div>
</div>
<script>setTimeout(() => { const m = document.getElementById('flash-msg'); if(m) m.style.opacity='0'; }, 5000);</script>
@endif

{{-- MAIN CONTENT --}}
@yield('content')

{{-- FOOTER --}}
<footer class="neon-border border-t-2 mt-12 py-6">
    <div class="mx-auto max-w-7xl px-4 text-center">
        <p class="text-cyan-400 text-xs font-mono">◆ CYBER NOTES v2.0 — LARAVEL EDITION ◆</p>
    </div>
</footer>

@stack('scripts')
</body>
</html>
