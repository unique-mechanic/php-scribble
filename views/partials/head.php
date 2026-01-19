<!doctype html>
<html lang="en" class="h-full" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <title>CyberNotes - Futuristic Note Taking</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.11.1/dist/full.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Space Mono', monospace;
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Orbitron', sans-serif;
            text-shadow: 0 0 10px rgba(0, 255, 255, 0.5);
            letter-spacing: 0.1em;
        }
        
        body {
            background: linear-gradient(135deg, #0a0e27 0%, #1a0033 50%, #0a0e27 100%);
            background-attachment: fixed;
            color: #00ff41;
        }
        
        .neon-border {
            border: 2px solid #00d9ff;
            box-shadow: 0 0 10px rgba(0, 217, 255, 0.5), inset 0 0 10px rgba(0, 217, 255, 0.1);
        }
        
        .neon-border-magenta {
            border: 2px solid #ff006e;
            box-shadow: 0 0 10px rgba(255, 0, 110, 0.5), inset 0 0 10px rgba(255, 0, 110, 0.1);
        }
        
        .glow-cyan {
            text-shadow: 0 0 10px #00ff41, 0 0 20px #00d9ff;
            color: #00ff41;
        }
        
        .glow-magenta {
            text-shadow: 0 0 10px #ff006e, 0 0 20px #c71585;
            color: #ff006e;
        }
        
        .cyber-card {
            background: rgba(10, 14, 39, 0.8);
            backdrop-filter: blur(10px);
            border: 2px solid #00d9ff;
            box-shadow: 0 0 20px rgba(0, 217, 255, 0.3);
            transition: all 0.3s ease;
        }
        
        .cyber-card:hover {
            border-color: #ff006e;
            box-shadow: 0 0 30px rgba(255, 0, 110, 0.5);
            transform: translateY(-5px);
        }
        
        .btn-cyber {
            background: linear-gradient(135deg, #00d9ff, #00ff41);
            color: #0a0e27;
            border: 2px solid #00ff41;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            box-shadow: 0 0 10px rgba(0, 255, 65, 0.5);
            transition: all 0.3s ease;
        }
        
        .btn-cyber:hover {
            background: linear-gradient(135deg, #00ff41, #ff006e);
            box-shadow: 0 0 20px rgba(255, 0, 110, 0.8);
            transform: scale(1.05);
        }
    </style>
</head>

<body class="h-full">
    <div>