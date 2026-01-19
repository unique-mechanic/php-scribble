<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <h2 class="text-4xl font-bold glow-cyan mb-2">▸ ALL NOTES</h2>
            <div class="h-1 w-32 bg-gradient-to-r from-cyan-400 to-transparent"></div>
        </div>

        <?php if ($success) : ?>
            <div id="success-message" class="mb-6 p-4 border-2 border-lime-400 bg-opacity-10 bg-lime-900 text-lime-400 rounded-none transition-opacity duration-500 font-mono text-sm">
                ✓ <?= htmlspecialchars($success) ?>
            </div>
            <script>
                setTimeout(function() {
                    const message = document.getElementById('success-message');
                    if (message) {
                        message.style.opacity = '0';
                    }
                }, 5000);
            </script>
        <?php endif; ?>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <?php foreach ($notes as $note) : ?>
                <div class="cyber-card p-6 rounded-none group">
                    <div class="flex items-start justify-between">
                        <a href="/note?id=<?= $note['id'] ?>" class="flex-1">
                            <h3 class="text-lg glow-cyan group-hover:glow-magenta transition-all duration-300 cursor-pointer">
                                ▸ <?= htmlspecialchars(substr($note['body'], 0, 50)) ?>...
                            </h3>
                        </a>
                        <span class="text-cyan-400 text-xs ml-2">ID: <?= $note['id'] ?></span>
                    </div>
                    <p class="text-gray-400 text-xs mt-4 font-mono">
                        [LENGTH: <?= strlen($note['body']) ?> chars]
                    </p>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-8 flex gap-4">
            <a href="/notes/create" class="btn-cyber px-6 py-3 rounded-none">➜ Create New Note</a>
        </div>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>
