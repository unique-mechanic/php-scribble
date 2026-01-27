<?php require('partials/head-red.php') ?>
<?php require('partials/nav-red.php') ?>
<?php require('partials/banner.php') ?>

<main class="min-h-screen bg-gradient-to-b from-red-950 via-gray-900 to-black">
    <div class="mx-auto max-w-7xl py-8 sm:px-6 lg:px-8">
        
        <!-- Top Stats Bar -->
        <div class="grid grid-cols-3 gap-8 mb-12">
            <!-- Total Notes Stat -->
            <div class="neon-border-red p-6 rounded-none">
                <div class="text-red-400 text-xs font-mono uppercase tracking-widest mb-2">[TOTAL TRANSMISSIONS]</div>
                <div class="text-4xl font-bold glow-red"><?= $totalNotes ?></div>
                <div class="text-gray-500 text-xs font-mono mt-2">NOTES_CREATED</div>
            </div>
            
            <!-- System Status -->
            <div class="neon-border-cyan p-6 rounded-none">
                <div class="text-cyan-400 text-xs font-mono uppercase tracking-widest mb-2">[SYSTEM STATUS]</div>
                <div class="text-2xl font-bold glow-cyan">OPERATIONAL</div>
                <div class="text-gray-500 text-xs font-mono mt-2">ALL_SYSTEMS_NOMINAL</div>
            </div>
            
            <!-- Effectiveness Rating -->
            <div class="neon-border-red p-6 rounded-none">
                <div class="text-red-400 text-xs font-mono uppercase tracking-widest mb-2">[EFFECTIVENESS]</div>
                <div class="text-4xl font-bold glow-red">98%</div>
                <div class="text-gray-500 text-xs font-mono mt-2">UPTIME_RATING</div>
            </div>
        </div>

        <!-- Main Content Section -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
            <!-- Left Sidebar Stats -->
            <div class="neon-border-red p-6 rounded-none h-fit">
                <h3 class="text-red-400 font-mono text-sm uppercase mb-4 tracking-widest">◆ PROJECT STATS</h3>
                <div class="space-y-4">
                    <div class="border-l-4 border-red-500 pl-4 py-2">
                        <div class="text-xs text-gray-400 font-mono">ARCHITECTURE</div>
                        <div class="text-red-400 font-bold">PHP MVC</div>
                    </div>
                    <div class="border-l-4 border-cyan-500 pl-4 py-2">
                        <div class="text-xs text-gray-400 font-mono">DATABASE</div>
                        <div class="text-cyan-400 font-bold">SQLite3</div>
                    </div>
                    <div class="border-l-4 border-red-500 pl-4 py-2">
                        <div class="text-xs text-gray-400 font-mono">FRAMEWORK</div>
                        <div class="text-red-400 font-bold">TailwindCSS</div>
                    </div>
                    <div class="border-l-4 border-cyan-500 pl-4 py-2">
                        <div class="text-xs text-gray-400 font-mono">UI_LIBRARY</div>
                        <div class="text-cyan-400 font-bold">DaisyUI</div>
                    </div>
                </div>
            </div>

            <!-- Center Content -->
            <div class="lg:col-span-2">
                <div class="neon-border-red p-8 rounded-none">
                    <h2 class="text-2xl font-bold glow-red mb-6">▸ CYBER NOTES SYSTEM</h2>
                    <p class="text-gray-300 mb-6 leading-relaxed font-mono text-sm">
                        Welcome to CyberNotes - a next-generation note-taking application built with cyberpunk aesthetics and high functionality. 
                        This system allows you to create, edit, and manage your digital transmissions in a futuristic interface.
                    </p>
                    
                    <div class="space-y-4 mb-6">
                        <div class="flex items-start space-x-4">
                            <div class="text-cyan-400 text-xl">◆</div>
                            <div>
                                <div class="text-red-400 font-bold text-sm">FAST & RESPONSIVE</div>
                                <div class="text-gray-400 text-xs">Optimized for speed with real-time updates</div>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="text-cyan-400 text-xl">◆</div>
                            <div>
                                <div class="text-red-400 font-bold text-sm">SECURE DATABASE</div>
                                <div class="text-gray-400 text-xs">SQLite3 with prepared statements</div>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="text-cyan-400 text-xl">◆</div>
                            <div>
                                <div class="text-red-400 font-bold text-sm">FUTURISTIC UI</div>
                                <div class="text-gray-400 text-xs">Cyberpunk 2077-inspired design</div>
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-red-600 pt-6">
                        <div class="text-cyan-400 text-xs font-mono mb-4">VERSION_INFO</div>
                        <div class="grid grid-cols-2 gap-4 text-xs font-mono">
                            <div>
                                <span class="text-gray-500">Build:</span>
                                <span class="text-red-400 ml-2">2026.01</span>
                            </div>
                            <div>
                                <span class="text-gray-500">Status:</span>
                                <span class="text-green-400 ml-2">ACTIVE</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Features Grid -->
        <div class="mb-12">
            <h3 class="text-xl font-bold glow-red mb-6">▸ SYSTEM FEATURES</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Feature 1 -->
                <div class="cyber-card-red-static p-6 rounded-none">
                    <div class="mb-3 h-12">
                        <img src="/Cyberpunk-Icons/SVG/Icon 4.svg" alt="Create" class="h-12 w-12" style="filter: invert(0.5) sepia(1) saturate(2) hue-rotate(-10deg);">
                    </div>
                    <h4 class="text-red-400 font-bold mb-2 uppercase text-sm">Create Notes</h4>
                    <p class="text-gray-400 text-xs leading-relaxed">
                        Compose and store your thoughts in a secure digital vault
                    </p>
                </div>
                
                <!-- Feature 2 -->
                <div class="cyber-card-red-static p-6 rounded-none">
                    <div class="mb-3 h-12">
                        <img src="/Cyberpunk-Icons/SVG/Icon 6.svg" alt="Edit" class="h-12 w-12" style="filter: invert(0.5) sepia(1) saturate(2) hue-rotate(-10deg);">
                    </div>
                    <h4 class="text-red-400 font-bold mb-2 uppercase text-sm">Edit & Update</h4>
                    <p class="text-gray-400 text-xs leading-relaxed">
                        Modify your notes anytime with instant synchronization
                    </p>
                </div>
                
                <!-- Feature 3 -->
                <div class="cyber-card-red-static p-6 rounded-none">
                    <div class="mb-3 h-12">
                        <img src="/Cyberpunk-Icons/SVG/Icon 14.svg" alt="Delete" class="h-12 w-12" style="filter: invert(0.5) sepia(1) saturate(2) hue-rotate(-10deg);">
                    </div>
                    <h4 class="text-red-400 font-bold mb-2 uppercase text-sm">Delete Notes</h4>
                    <p class="text-gray-400 text-xs leading-relaxed">
                        Remove old transmissions to keep your system clean
                    </p>
                </div>
            </div>
        </div>

        <!-- Navigation Buttons -->
        <div class="flex flex-wrap gap-4 justify-center mb-8">
            <a href="/" class="neon-border-red px-6 py-3 rounded-none text-red-400 hover:bg-red-900 hover:text-red-200 transition font-mono text-sm uppercase">
                ◆ HOME
            </a>
            <a href="/notes" class="neon-border-cyan px-6 py-3 rounded-none text-cyan-400 hover:bg-cyan-900 hover:text-cyan-200 transition font-mono text-sm uppercase">
                ◆ DATABASE
            </a>
            <a href="/notes/create" class="neon-border-red px-6 py-3 rounded-none text-red-400 hover:bg-red-900 hover:text-red-200 transition font-mono text-sm uppercase">
                ◆ CREATE NEW
            </a>
        </div>

        <!-- Footer Stats -->
        <div class="neon-border-red p-4 rounded-none">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
                <div>
                    <div class="text-gray-500 text-xs font-mono">NOTES_TOTAL</div>
                    <div class="text-red-400 font-bold text-xl"><?= $totalNotes ?></div>
                </div>
                <div>
                    <div class="text-gray-500 text-xs font-mono">SYSTEM_UPTIME</div>
                    <div class="text-cyan-400 font-bold text-xl">24/7</div>
                </div>
                <div>
                    <div class="text-gray-500 text-xs font-mono">DATABASE_SIZE</div>
                    <div class="text-red-400 font-bold text-xl">OPTIMAL</div>
                </div>
                <div>
                    <div class="text-gray-500 text-xs font-mono">STATUS</div>
                    <div class="text-green-400 font-bold text-xl">ONLINE</div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require('partials/footer.php') ?>
