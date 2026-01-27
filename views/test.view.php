<?php require('partials/head-red.php') ?>
<?php require('partials/nav-red.php') ?>
<?php require('partials/banner.php') ?>

<div class="min-h-screen bg-black text-[#f23c3c] font-mono p-8 uppercase tracking-widest relative overflow-hidden select-none">
  
  <nav class="flex justify-between items-start mb-16">
    <div class="flex gap-10">
      <div class="border-b-2 border-cyan-500 pb-1">
        <span class="text-2xl text-cyan-400 font-bold">12</span>
        <span class="text-[10px] text-cyan-400 ml-2">LEVEL</span>
      </div>
      <div class="border-b-2 border-cyan-500 pb-1">
        <span class="text-2xl text-cyan-400 font-bold">19</span>
        <span class="text-[10px] text-cyan-400 ml-2">STREET CRED</span>
      </div>
    </div>

    <div class="flex gap-8 text-sm pt-2">
      <span class="hover:text-white cursor-pointer transition-colors">Inventory</span>
      <span class="hover:text-white cursor-pointer transition-colors">Map</span>
      <div class="relative">
        <span class="text-cyan-400 cursor-default">Character</span>
        <div class="absolute -bottom-2 left-0 w-full h-[2px] bg-cyan-400"></div>
      </div>
      <span class="hover:text-white cursor-pointer transition-colors">Journal</span>
      <span class="hover:text-white cursor-pointer transition-colors">Crafting</span>
    </div>

    <div class="flex gap-6 pt-2">
      <span class="text-red-600/80 italic text-sm font-bold">112/240</span>
      <span class="text-yellow-500 text-sm font-bold">€$ 32214</span>
    </div>
  </nav>

  <div class="absolute left-8 top-1/3 space-y-12">
    <div class="flex items-center gap-4">
        <span class="text-5xl text-cyan-400 font-light">0</span>
        <div class="text-[9px] leading-tight text-cyan-400">Attribute Points<br/>Available</div>
    </div>
    <div class="flex items-center gap-4">
        <span class="text-5xl text-yellow-500 font-light">6</span>
        <div class="text-[9px] leading-tight text-yellow-500">Perk Points<br/>Available</div>
    </div>
  </div>

  <div class="relative flex flex-col items-center mt-10">
    
    <div class="mb-4 self-center ml-[-120px] text-[10px] text-cyan-400/80 space-y-1 italic">
        <p>HANDGUNS <span class="text-gray-500 ml-2">LEVEL: 6</span></p>
        <p>BLADES <span class="text-gray-500 ml-2">LEVEL: 3</span></p>
    </div>

    <div class="relative w-[500px] h-[500px] flex items-center justify-center mt-10">
        
        <svg class="absolute inset-0 w-full h-full stroke-red-950/40" viewBox="0 0 100 100">
            <line x1="50" y1="20" x2="50" y2="80" stroke-width="0.5" />
            <line x1="20" y1="50" x2="80" y2="50" stroke-width="0.5" />
            <line x1="25" y1="25" x2="75" y2="75" stroke-width="0.5" />
            <line x1="75" y1="25" x2="25" y2="75" stroke-width="0.5" />
        </svg>

        <div class="absolute top-0 w-32 h-32 rotate-45 border-2 border-cyan-400 bg-black/50 shadow-[0_0_15px_rgba(34,211,238,0.2)] flex items-center justify-center group cursor-pointer hover:bg-cyan-950/20 transition-all">
            <div class="-rotate-45 flex flex-col items-center">
                <span class="text-[10px] text-cyan-400 mb-2 font-bold">REFLEXES</span>
                <div class="w-5 h-5 border border-cyan-400/50 flex items-center justify-center">
                    <div class="w-2 h-2 bg-cyan-400"></div>
                </div>
            </div>
        </div>

        <div class="absolute w-36 h-36 rotate-45 border border-red-900/40 bg-[#120505] flex items-center justify-center shadow-[0_0_30px_rgba(255,0,0,0.1)]">
            <div class="-rotate-45 text-center">
                <div class="text-4xl font-bold text-gray-300 tracking-tighter">12</div>
                <div class="text-[10px] text-gray-600 font-bold">LEVEL</div>
            </div>
        </div>

        <div class="absolute left-0 w-28 h-28 rotate-45 border border-red-900/60 flex items-center justify-center hover:border-red-500 transition-colors bg-black/40">
            <div class="-rotate-45 text-center">
                <div class="text-[9px] text-red-700 mb-1">BODY</div>
                <div class="text-2xl text-red-600">4</div>
                <div class="text-[7px] text-red-900">VALUE</div>
            </div>
        </div>

        <div class="absolute right-0 w-28 h-28 rotate-45 border border-red-900/60 flex items-center justify-center hover:border-red-500 transition-colors bg-black/40">
            <div class="-rotate-45 text-center">
                <div class="text-[9px] text-red-700 leading-none mb-1">TECHNICAL<br/>ABILITY</div>
                <div class="text-2xl text-red-600">8</div>
                <div class="text-[7px] text-red-900">VALUE</div>
            </div>
        </div>

        <div class="absolute bottom-4 left-12 w-28 h-28 rotate-45 border border-red-900/60 flex items-center justify-center hover:border-red-500 transition-colors bg-black/40">
            <div class="-rotate-45 text-center">
                <div class="-rotate-45 text-[9px] text-red-700 mb-1">INTELLIGENCE</div>
                <div class="text-2xl text-red-600">8</div>
                <div class="text-[7px] text-red-900">VALUE</div>
            </div>
        </div>

        <div class="absolute bottom-4 right-12 w-28 h-28 rotate-45 border border-red-900/60 flex items-center justify-center hover:border-red-500 transition-colors bg-black/40">
            <div class="-rotate-45 text-center">
                <div class="text-[9px] text-red-700 mb-1">COOL</div>
                <div class="text-2xl text-red-600">6</div>
                <div class="text-[7px] text-red-900">VALUE</div>
            </div>
        </div>
    </div>
  </div>

</div>

<div class="min-h-screen bg-[#0a0505] text-[#f23c3c] font-mono p-6 uppercase tracking-wider relative overflow-hidden select-none">
  
  <nav class="flex justify-between items-center border-b border-red-900/30 pb-2 mb-8">
    <div class="flex gap-8 items-center">
      <div class="text-cyan-400 border-b-2 border-cyan-400 pb-1 text-2xl font-bold">12 <span class="text-xs font-normal">LEVEL</span></div>
      <div class="text-[#20e2d7] border-b-2 border-[#20e2d7] pb-1 text-2xl font-bold">19 <span class="text-xs font-normal">STREET CRED</span></div>
    </div>

    <div class="flex items-center gap-6">
      <div class="flex items-center gap-2 text-[10px] opacity-60">
        <span class="px-1 border border-gray-600 rounded">L1</span>
        <span>TRADE</span>
      </div>
      <div class="relative px-4">
          <span class="text-cyan-400 text-sm font-bold tracking-[0.2em] flex items-center gap-2">
            <span class="w-2 h-2 bg-cyan-400 rotate-45"></span> CYBERWARE <span class="w-2 h-2 bg-cyan-400 rotate-45"></span>
          </span>
          <div class="absolute -bottom-[11px] left-0 w-full h-[2px] bg-cyan-400 shadow-[0_0_10px_cyan]"></div>
      </div>
      <div class="flex items-center gap-2 text-[10px] opacity-60">
        <span>TRADE</span>
        <span class="px-1 border border-gray-600 rounded">R1</span>
      </div>
    </div>

    <div class="flex gap-6 items-center">
      <div class="flex items-center gap-2 text-red-500">
        <div class="w-3 h-4 bg-red-950 border border-red-500 relative">
            <div class="absolute bottom-0 left-0 w-full h-1/2 bg-red-500"></div>
        </div>
        <span class="text-sm">112 / 200</span>
      </div>
      <span class="text-yellow-500 text-sm font-bold">€$ 36564</span>
    </div>
  </nav>

  <div class="grid grid-cols-12 gap-4 h-[calc(100vh-150px)]">
    
    <div class="col-span-4 space-y-6">
      <div>
        <h2 class="text-xs font-bold mb-3 text-red-600">INSTALLED:</h2>
        <div class="flex gap-2">
          <div class="w-16 h-16 border-2 border-cyan-400 bg-cyan-900/20 p-1 relative group cursor-pointer">
            <div class="w-full h-full bg-gray-800 flex items-center justify-center">
                <div class="w-8 h-8 border border-cyan-400 opacity-40"></div>
            </div>
          </div>
          <div class="w-16 h-16 border border-red-900 bg-black p-1 relative opacity-60">
            <div class="w-full h-full bg-red-950/20"></div>
            <div class="absolute inset-0 flex items-center justify-center text-red-500">+</div>
          </div>
        </div>
        <div class="mt-4">
            <h1 class="text-2xl font-bold tracking-tighter italic">FRONTAL CORTEX</h1>
            <p class="text-[8px] opacity-40">MODEL LINE: L2001A</p>
        </div>
      </div>

      <div class="pt-4 border-t border-red-900/30">
        <div class="flex justify-between items-end mb-3">
            <h2 class="text-xs font-bold text-red-600">POSSIBLE REPLACEMENTS:</h2>
            <span class="text-[9px] border border-cyan-500 px-2 py-0.5 text-cyan-400">DEFAULT</span>
        </div>
        
        <div class="grid grid-cols-5 gap-2">
          <div class="aspect-square bg-red-950/20 border border-red-900 p-1 relative group cursor-pointer hover:border-red-500">
             <div class="w-full h-full border-l-2 border-orange-500 bg-black/40 flex items-center justify-center">
                <span class="text-[8px] text-orange-500 font-bold border border-orange-500 px-0.5">REQ</span>
             </div>
          </div>
          <div class="aspect-square bg-red-950/20 border border-red-900 p-1"></div>
          <div class="aspect-square bg-red-950/20 border border-red-900 p-1"></div>
          <div class="aspect-square bg-red-950/20 border border-red-900 p-1"></div>
          <div class="aspect-square bg-red-950/20 border border-red-900 p-1"></div>
          <div class="aspect-square bg-red-950/20 border border-cyan-500 p-1">
             <div class="w-full h-full border-l-2 border-green-500 bg-black/40"></div>
          </div>
          <div class="aspect-square bg-red-950/20 border border-red-900 p-1"></div>
          <div class="aspect-square bg-red-950/20 border border-red-900 p-1"></div>
        </div>
      </div>
    </div>

    <div class="col-span-5 relative flex items-center justify-center">
        <div class="absolute inset-0 bg-gradient-to-b from-transparent via-cyan-500/5 to-transparent pointer-events-none"></div>
        
        <div class="w-80 h-80 rounded-full bg-cyan-500/10 border border-cyan-500/20 blur-3xl animate-pulse"></div>
        <div class="absolute flex flex-col items-center opacity-80">
            <div class="w-48 h-64 bg-cyan-900/20 border-x border-cyan-500/30 rounded-full flex items-center justify-center">
                <span class="text-cyan-400 text-[10px] animate-pulse">V_SYSTEM_SCAN...</span>
            </div>
            <div class="w-1 h-32 bg-gradient-to-t from-cyan-500 to-transparent mt-[-20px]"></div>
        </div>
    </div>

    <div class="col-span-3 space-y-4 text-right">
        <div>
            <h3 class="text-red-500 text-lg font-bold">CASSIUS</h3>
            <p class="text-[8px] opacity-40">TRN_7LCA3_800095 | RIPPER_STORE_55201</p>
        </div>
        <div class="pt-4">
            <span class="text-yellow-500 text-2xl font-bold italic">€$ 11852</span>
        </div>
        <div class="mt-20 space-y-1 opacity-20 text-[7px] font-mono">
            <p>TASK_MANAGER_SD15</p>
            <p>CORE_SUB_SCAN_INIT</p>
            <p>MEM_ALLOC_ERROR_0x002</p>
        </div>
    </div>
  </div>

  <div class="absolute bottom-6 right-10 flex items-center gap-2 cursor-pointer group">
    <div class="w-5 h-5 rounded-full border-2 border-cyan-400 flex items-center justify-center group-hover:bg-cyan-400 transition-colors">
        <div class="w-1.5 h-1.5 bg-cyan-400 group-hover:bg-black rounded-full"></div>
    </div>
    <span class="text-cyan-400 text-xs">Back</span>
  </div>

</div>

<div class="min-h-screen bg-[#0a0505] text-[#f23c3c] font-mono p-6 uppercase tracking-wider relative overflow-hidden select-none">
  
  <div class="grid grid-cols-12 gap-4 h-[calc(100vh-150px)]">
    
<div class="col-span-5 relative flex items-center justify-center overflow-visible">
    
    <div class="absolute w-64 h-80 bg-cyan-500/5 blur-[60px] rounded-full"></div>
    <div class="absolute w-40 h-40 bg-orange-500/10 blur-[40px] rounded-full mt-[-40px]"></div>

    <svg viewBox="0 0 200 250" class="w-full h-auto drop-shadow-[0_0_10px_rgba(34,211,238,0.3)] opacity-90">
        <defs>
            <path id="brainSilhouette" 
                  d="M 94,170 
                     C 80,170 60,165 50,140 
                     C 40,115 35,90 45,60 
                     C 55,30 80,20 98,25 
                     L 100,25 
                     L 102,25 
                     C 120,20 145,30 155,60 
                     C 165,90 160,115 150,140 
                     C 140,165 120,170 106,170 
                     L 106,230 
                     L 94,230 
                     Z" 
                  fill="white" />

            <filter id="brainTexture">
                <feTurbulence type="fractalNoise" baseFrequency="0.03" numOctaves="4" result="noise" />
                <feDisplacementMap in="SourceGraphic" in2="noise" scale="8" xChannelSelector="R" yChannelSelector="G" />
            </filter>

            <radialGradient id="holoGradient" cx="50%" cy="40%" r="60%">
                <stop offset="0%" stop-color="#fb923c" stop-opacity="0.9" /> <stop offset="45%" stop-color="#22d3ee" stop-opacity="0.6" /> <stop offset="90%" stop-color="#0e7490" stop-opacity="0.2" /> <stop offset="100%" stop-color="transparent" />
            </radialGradient>
        </defs>

        <g mask="url(#scanlineMask)">
             <rect width="200" height="250" fill="url(#holoGradient)" mask="url(#maskShape)" style="filter: url(#brainTexture);" />
        </g>
        
        <mask id="maskShape">
             <use href="#brainSilhouette" fill="white" />
             <rect x="99" y="20" width="2" height="150" fill="black" />
        </mask>

        <defs>
            <pattern id="scanlines" x="0" y="0" width="1" height="2" patternUnits="userSpaceOnUse">
                <rect y="0" width="1" height="1" fill="white" opacity="0.8" />
            </pattern>
        </defs>
        
        <g mask="url(#maskShape)" class="animate-pulse">
             <rect width="200" height="250" fill="url(#scanlines)" fill-opacity="0.3" style="filter: url(#brainTexture);" />
        </g>
        
        <rect x="96" y="170" width="8" height="60" fill="cyan" opacity="0.3" />
        <rect x="98" y="170" width="4" height="60" fill="white" opacity="0.4">
             <animate attributeName="opacity" values="0.2;0.6;0.2" dur="2s" repeatCount="indefinite" />
        </rect>

    </svg>

    <div class="absolute top-10 right-0 opacity-60">
        <div class="h-[1px] w-10 bg-cyan-400 absolute right-full top-1/2 mr-2"></div>
    </div>
</div>

    </div>

  </div>
