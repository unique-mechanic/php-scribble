<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-4xl py-4 sm:px-6 lg:px-8">
        <div class="mb-6">
            <a href="/notes" class="text-cyan-400 hover:text-magenta-400 transition-colors font-mono text-sm">
                ◄ BACK TO NOTES
            </a>
        </div>

        <div class="cyber-card p-8 rounded-none mb-6">
            <h2 class="text-2xl font-bold glow-cyan mb-4">▸ NOTE CONTENT</h2>
            <div class="border-t border-cyan-400 pt-6">
                <p class="text-gray-300 leading-relaxed whitespace-pre-wrap">
                    <?= htmlspecialchars($note['body']) ?>
                </p>
            </div>
            <div class="border-t border-cyan-400 mt-6 pt-6">
                <p class="text-cyan-400 text-xs font-mono">
                    [ID: <?= $note['id'] ?> | USER: <?= $note['user_id'] ?>]
                </p>
            </div>
        </div>

        <div class="flex gap-4">
            <form method="POST" class="inline">
                <button 
                    type="submit"
                    class="px-6 py-3 bg-red-900 border-2 border-red-500 text-red-400 hover:bg-red-800 hover:text-red-300 rounded-none font-bold uppercase text-sm transition-all duration-300"
                    onclick="return confirm('Are you sure? This cannot be undone.');"
                >
                    ✗ DELETE NOTE
                </button>
            </form>
            
            <a href="/notes/create" class="btn-cyber px-6 py-3 rounded-none">
                ➜ CREATE NEW NOTE
            </a>
        </div>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>
