<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-4 sm:px-6 lg:px-8">
        <div class="mb-12 text-center">
            <h1 class="text-5xl md:text-7xl font-bold glow-cyan mb-4">◆ CYBER NOTES ◆</h1>
            <p class="text-xl text-cyan-300 font-mono">[WELCOME TO THE FUTURE]</p>
            <div class="mt-6 h-1 w-64 bg-gradient-to-r from-cyan-400 via-magenta-500 to-cyan-400 mx-auto"></div>
        </div>

        <!-- CONCEPT 6: Arrays and Methods -->
        <!-- We received $recentNotes array from the controller -->
        
        <section class="mt-16">
            <div class="mb-8">
                <h2 class="text-3xl font-bold glow-magenta mb-2">▸ RECENT TRANSMISSIONS</h2>
                <div class="h-1 w-40 bg-gradient-to-r from-magenta-600 to-transparent"></div>
            </div>
            
            <?php if (count($recentNotes) > 0): ?>
                <!-- CONCEPT 7: Looping through arrays with foreach -->
                <!-- Each iteration: $note contains one item from the array -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <?php foreach ($recentNotes as $note): ?>
                        <div class="cyber-card p-6 rounded-none group">
                            <div class="flex items-start justify-between mb-4">
                                <a href="/note?id=<?= $note['id'] ?>" class="flex-1">
                                    <!-- $note is an associative array (dictionary) -->
                                    <!-- Access data with ['key'] syntax -->
                                    <p class="text-sm glow-cyan group-hover:glow-magenta transition-all duration-300 cursor-pointer line-clamp-3">
                                        <? if (strlen($note['body']) > 80): ?>
                                        <?= htmlspecialchars(substr($note['body'], 0, 80)) ?>...
                                        <? else: ?>
                                        <?= htmlspecialchars($note['body']) ?>
                                        <? endif; ?>
                                    </p>
                                </a>
                            </div>
                            <div class="border-t border-cyan-400 pt-3">
                                <p class="text-cyan-400 text-xs font-mono">
                                    [ID: <?= $note['id'] ?> | USER: <?= $note['user_id'] ?>]
                                </p>
                                <p class="text-gray-500 text-xs font-mono">
                                    [LENGTH: <?= strlen($note['body']) ?> BYTES]
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <div class="mt-8 text-center">
                    <a href="/notes" class="btn-cyber px-8 py-3 rounded-none inline-block">
                        ➜ VIEW ALL NOTES
                    </a>
                </div>
            <?php else: ?>
                <!-- If array is empty, show this message -->
                <div class="cyber-card p-8 rounded-none text-center neon-border">
                    <p class="text-cyan-400 mb-4 font-mono text-lg">[NO DATA DETECTED]</p>
                    <p class="text-gray-400 mb-6">The database is empty. Create your first note to begin.</p>
                    <a href="/notes/create" class="btn-cyber px-8 py-3 rounded-none inline-block">➜ CREATE FIRST NOTE</a>
                </div>
            <?php endif; ?>
        </section>
    </div>
</main>

<?php require('partials/footer.php') ?>
