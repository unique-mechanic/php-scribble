<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'CyberNotes') }}</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.11.1/dist/full.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Space Mono', monospace; }
        h1,h2,h3 { font-family: 'Orbitron', sans-serif; }
        body { background: linear-gradient(135deg, #0a0e27 0%, #1a0033 50%, #0a0e27 100%); background-attachment: fixed; color: #00ff41; }
        .neon-border { border: 2px solid #00d9ff; box-shadow: 0 0 10px rgba(0,217,255,0.5), inset 0 0 10px rgba(0,217,255,0.1); }
        .glow-cyan { text-shadow: 0 0 10px #00ff41, 0 0 20px #00d9ff; color: #00ff41; }
        .btn-cyber { background: linear-gradient(135deg, #00d9ff, #00ff41); color: #0a0e27; border: 2px solid #00ff41; font-weight: bold; text-transform: uppercase; letter-spacing: 0.1em; box-shadow: 0 0 10px rgba(0,255,65,0.5); transition: all 0.3s ease; }
        .btn-cyber:hover { background: linear-gradient(135deg, #00ff41, #ff006e); box-shadow: 0 0 20px rgba(255,0,110,0.8); }
        .cyber-input { background: rgba(10,14,39,0.9) !important; border: 2px solid #00d9ff !important; color: #00ff41 !important; font-family: 'Space Mono', monospace !important; border-radius: 0 !important; }
        .cyber-input:focus { border-color: #ff006e !important; box-shadow: 0 0 15px rgba(255,0,110,0.5) !important; outline: none !important; }
        .cyber-label { font-size: 0.75rem; color: #00d9ff; font-weight: bold; text-transform: uppercase; letter-spacing: 0.1em; }
        .skill-card { background: rgba(10,14,39,0.85); border: 2px solid #00d9ff; box-shadow: 0 0 15px rgba(0,217,255,0.3); }
    </style>
</head>
<body class="min-h-screen flex flex-col items-center justify-center py-12">
    <a href="/" class="mb-8">
        <h1 class="text-3xl font-black glow-cyan">◆ CYBER NOTES ◆</h1>
    </a>
    <div class="w-full max-w-md skill-card p-8">
        {{ $slot }}
    </div>
</body>
</html>
