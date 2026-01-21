<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main class="scanlines grid-lines min-h-screen">
    <div class="mx-auto w-full max-w-7xl py-4">
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

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 h-full">
            <!-- LEFT SIDEBAR - STATS/CATEGORIES -->
            <div class="skills-sidebar rounded-none lg:col-span-1 p-4">
                <div class="mb-6">
                    <h3 class="text-cyan-400 text-xs font-bold uppercase tracking-widest mb-3">▸ NOTE STATS</h3>
                    <div class="space-y-3">
                        <div class="total-stats p-3 rounded-none">
                            <div class="skill-stat">Total Notes</div>
                            <div class="text-2xl font-bold glow-cyan"><?= count($notes) ?></div>
                        </div>
                        <div class="total-stats p-3 rounded-none">
                            <div class="skill-stat">Total Characters</div>
                            <div class="text-2xl font-bold glow-cyan">
                                <?= array_reduce($notes, fn($sum, $n) => $sum + strlen($n['body']), 0) ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-t border-cyan-400 pt-4">
                    <h3 class="text-cyan-400 text-xs font-bold uppercase tracking-widest mb-4">▸ CATEGORIES</h3>
                <div class="space-y-2">
                        <div class="skill-category active" onclick="filterNotes('all')">
                            <span class="text-cyan-400 font-bold">ALL NOTES</span>
                            <div class="skill-bar">
                                <div class="skill-bar-fill" style="width: 100%;"></div>
                            </div>
                        </div>
                        <div class="skill-category" onclick="filterNotes('short')">
                            <span class="text-gray-400">SHORT (&lt;50)</span>
                            <div class="skill-bar">
                                <div class="skill-bar-fill" style="width: <?= count(array_filter($notes, fn($n) => strlen($n['body']) < 50)) / count($notes) * 100 ?>%;"></div>
                            </div>
                        </div>
                        <div class="skill-category" onclick="filterNotes('medium')">
                            <span class="text-gray-400">MEDIUM (50-200)</span>
                            <div class="skill-bar">
                                <div class="skill-bar-fill" style="width: <?= count(array_filter($notes, fn($n) => strlen($n['body']) >= 50 && strlen($n['body']) <= 200)) / count($notes) * 100 ?>%;"></div>
                            </div>
                        </div>
                        <div class="skill-category" onclick="filterNotes('long')">
                            <span class="text-gray-400">LONG (&gt;200)</span>
                            <div class="skill-bar">
                                <div class="skill-bar-fill" style="width: <?= count(array_filter($notes, fn($n) => strlen($n['body']) > 200)) / count($notes) * 100 ?>%;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 pt-4 border-t border-cyan-400">
                    <a href="/notes/create" class="btn-cyber px-4 py-2 rounded-none w-full text-center block text-sm">
                        ➜ NEW NOTE
                    </a>
                </div>
            </div>

            <!-- RIGHT CONTENT - SKILLS GRID -->
            <div class="lg:col-span-3 pr-4">
                <div class="mb-4">
                    <h2 class="text-3xl font-bold glow-magenta mb-2">▸ NOTE DATABASE</h2>
                    <div class="h-1 w-40 bg-gradient-to-r from-magenta-600 to-transparent"></div>
                </div>

                <?php if (count($notes) > 0): ?>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4" id="notes-container">
                        <?php foreach ($notes as $note): ?>
                            <a href="/note?id=<?= $note['id'] ?>" class="group note-card" data-length="<?= strlen($note['body']) ?>">
                                <div class="skill-card p-6 rounded-none h-full">
                                    <!-- Header -->
                                    <div class="flex items-start justify-between mb-4">
                                        <h3 class="text-sm glow-cyan group-hover:glow-magenta transition-all duration-300 line-clamp-2 flex-1">
                                            ▸ <?= htmlspecialchars(substr($note['body'], 0, 45)) ?>
                                        </h3>
                                        <span class="skill-stat ml-2 flex-shrink-0">ID<?= $note['id'] ?></span>
                                    </div>

                                    <!-- Preview -->
                                    <p class="text-xs text-gray-400 line-clamp-2 mb-4">
                                        <?= htmlspecialchars(substr($note['body'], 0, 80)) ?>...
                                    </p>

                                    <!-- Stats Bar -->
                                    <div class="border-t border-cyan-400 pt-3 space-y-2">
                                        <div class="flex justify-between items-center">
                                            <span class="skill-stat">LENGTH</span>
                                            <span class="skill-stat-value"><?= strlen($note['body']) ?> CH</span>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <span class="skill-stat">USER</span>
                                            <span class="skill-stat-value"><?= $note['user_id'] ?></span>
                                        </div>
                                        
                                        <!-- Progress Bar -->
                                        <div class="skill-bar mt-3">
                                            <div class="skill-bar-fill" style="width: <?= min(strlen($note['body']) / 10, 100) ?>%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div class="skill-card p-8 rounded-none text-center neon-border">
                        <p class="text-cyan-400 mb-4 font-mono text-lg">[NO DATA DETECTED]</p>
                        <p class="text-gray-400 mb-6">The database is empty. Create your first note to begin.</p>
                        <a href="/notes/create" class="btn-cyber px-8 py-3 rounded-none inline-block">➜ CREATE FIRST NOTE</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>

<script>
function filterNotes(category) {
    const cards = document.querySelectorAll('.note-card');
    const categories = document.querySelectorAll('.skill-category');
    let visibleCount = 0;

    // Update active state
    categories.forEach((cat, index) => {
        cat.classList.remove('active');
        if (
            (category === 'all' && index === 0) ||
            (category === 'short' && index === 1) ||
            (category === 'medium' && index === 2) ||
            (category === 'long' && index === 3)
        ) {
            cat.classList.add('active');
        }
    });

    // Filter cards
    cards.forEach(card => {
        const length = parseInt(card.dataset.length);
        let show = false;

        if (category === 'all') {
            show = true;
        } else if (category === 'short' && length < 50) {
            show = true;
        } else if (category === 'medium' && length >= 50 && length <= 200) {
            show = true;
        } else if (category === 'long' && length > 200) {
            show = true;
        }

        if (show) {
            card.style.display = 'block';
            visibleCount++;
            card.style.animation = 'fadeIn 0.3s ease';
        } else {
            card.style.display = 'none';
        }
    });

    // Show message if no notes match
    if (visibleCount === 0) {
        const container = document.getElementById('notes-container');
        if (!document.getElementById('no-match-message')) {
            const msg = document.createElement('div');
            msg.id = 'no-match-message';
            msg.className = 'skill-card p-8 rounded-none text-center neon-border col-span-full';
            msg.innerHTML = '<p class="text-cyan-400 font-mono">[NO NOTES IN THIS CATEGORY]</p>';
            container.appendChild(msg);
        }
    } else {
        const msg = document.getElementById('no-match-message');
        if (msg) msg.remove();
    }
}

// Add fade-in animation
const style = document.createElement('style');
style.textContent = `
    @keyframes fadeIn {
        from { opacity: 0; transform: scale(0.95); }
        to { opacity: 1; transform: scale(1); }
    }
`;
document.head.appendChild(style);
</script>

<?php require base_path('views/partials/footer.php') ?>
