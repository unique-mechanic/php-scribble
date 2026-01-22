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
            text-shadow: 0 0 10px rgba(220, 38, 38, 0.6);
            letter-spacing: 0.1em;
        }
        
        body {
            background: linear-gradient(135deg, #1a0f0f 0%, #2d0a0a 50%, #1a0f0f 100%);
            background-attachment: fixed;
            color: #ff4444;
        }
        
        .neon-border-red {
            border: 2px solid #dc2626;
            box-shadow: 0 0 10px rgba(220, 38, 38, 0.7), inset 0 0 10px rgba(220, 38, 38, 0.1);
        }
        
        .neon-border-cyan {
            border: 2px solid #00d9ff;
            box-shadow: 0 0 10px rgba(0, 217, 255, 0.5), inset 0 0 10px rgba(0, 217, 255, 0.1);
        }
        
        .glow-red {
            text-shadow: 0 0 10px #dc2626, 0 0 20px #ef4444;
            color: #ff4444;
        }
        
        .glow-red-bright {
            text-shadow: 0 0 15px #ef4444, 0 0 30px #fca5a5;
            color: #fca5a5;
        }
        
        .glow-cyan {
            text-shadow: 0 0 10px #00d9ff, 0 0 20px #06b6d4;
            color: #00d9ff;
        }
        
        .cyber-card-red {
            background: rgba(26, 15, 15, 0.8);
            backdrop-filter: blur(10px);
            border: 2px solid #dc2626;
            box-shadow: 0 0 20px rgba(220, 38, 38, 0.4);
            transition: all 0.3s ease;
        }
        
        .cyber-card-red:hover {
            border-color: #00d9ff;
            box-shadow: 0 0 30px rgba(0, 217, 255, 0.6);
            transform: translateY(-5px);
        }

        .cyber-card-red-static {
            background: rgba(26, 15, 15, 0.8);
            backdrop-filter: blur(10px);
            border: 2px solid #dc2626;
            box-shadow: 0 0 20px rgba(220, 38, 38, 0.4);
        }
        
        .btn-cyber-red {
            background: linear-gradient(135deg, #dc2626, #ef4444);
            color: #1a0f0f;
            border: 2px solid #ff4444;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            box-shadow: 0 0 10px rgba(239, 68, 68, 0.6);
            transition: all 0.3s ease;
        }
        
        .btn-cyber-red:hover {
            background: linear-gradient(135deg, #ef4444, #fca5a5);
            box-shadow: 0 0 20px rgba(252, 165, 165, 0.8);
            transform: scale(1.05);
        }

        /* CP2077 Scanline Effect */
        .scanlines {
            position: relative;
            overflow: hidden;
        }

        .scanlines::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: repeating-linear-gradient(
                0deg,
                rgba(0, 0, 0, 0.15),
                rgba(0, 0, 0, 0.15) 1px,
                transparent 1px,
                transparent 2px
            );
            pointer-events: none;
            z-index: 1;
        }

        /* Skills Menu Sidebar */
        .skills-sidebar {
            background: rgba(26, 15, 15, 0.9);
            border-right: 3px solid #dc2626;
            box-shadow: inset -10px 0 20px rgba(220, 38, 38, 0.1);
        }

        .skill-category {
            padding: 12px 16px;
            border-left: 4px solid transparent;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .skill-category:hover {
            border-left-color: #ff4444;
            background: rgba(255, 68, 68, 0.1);
            transform: translateX(4px);
        }

        .skill-category.active {
            border-left-color: #00d9ff;
            background: rgba(0, 217, 255, 0.15);
            box-shadow: inset 0 0 10px rgba(0, 217, 255, 0.3);
        }

        .skill-bar {
            width: 100%;
            height: 4px;
            background: rgba(220, 38, 38, 0.2);
            border: 1px solid #dc2626;
            margin-top: 6px;
            overflow: hidden;
        }

        .skill-bar-fill {
            height: 100%;
            background: linear-gradient(90deg, #dc2626, #ef4444);
            box-shadow: 0 0 10px rgba(239, 68, 68, 0.8);
        }

        /* Skills Card */
        .skill-card {
            background: rgba(26, 15, 15, 0.85);
            border: 2px solid #dc2626;
            box-shadow: 0 0 15px rgba(220, 38, 38, 0.4), inset 0 0 15px rgba(220, 38, 38, 0.05);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .skill-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, transparent, #00d9ff, transparent);
            opacity: 0;
            animation: topGlow 2s ease-in-out infinite;
        }

        @keyframes topGlow {
            0%, 100% { opacity: 0; }
            50% { opacity: 1; }
        }

        .skill-card:hover {
            border-color: #00d9ff;
            box-shadow: 0 0 25px rgba(0, 217, 255, 0.6), inset 0 0 20px rgba(0, 217, 255, 0.1);
            transform: translateY(-8px) scale(1.02);
        }

        .skill-stat {
            font-size: 0.75rem;
            color: #dc2626;
            font-weight: bold;
            font-family: 'Space Mono', monospace;
            text-transform: uppercase;
            letter-spacing: 0.1em;
        }

        .skill-stat-value {
            color: #ff4444;
            text-shadow: 0 0 5px rgba(255, 68, 68, 0.8);
        }

        /* Grid lines effect */
        .grid-lines {
            background-image: 
                linear-gradient(0deg, transparent 24%, rgba(220, 38, 38, 0.05) 25%, rgba(220, 38, 38, 0.05) 26%, transparent 27%, transparent 74%, rgba(220, 38, 38, 0.05) 75%, rgba(220, 38, 38, 0.05) 76%, transparent 77%, transparent),
                linear-gradient(90deg, transparent 24%, rgba(220, 38, 38, 0.05) 25%, rgba(220, 38, 38, 0.05) 26%, transparent 27%, transparent 74%, rgba(220, 38, 38, 0.05) 75%, rgba(220, 38, 38, 0.05) 76%, transparent 77%, transparent);
            background-size: 50px 50px;
        }

        .total-stats {
            background: rgba(26, 15, 15, 0.9);
            border: 2px solid #ff4444;
            box-shadow: 0 0 15px rgba(255, 68, 68, 0.4);
        }
    </style>
</head>

<body class="h-full">
    <div>
