<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-2xl py-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <h2 class="text-4xl font-bold glow-magenta mb-2">▸ CREATE NEW NOTE</h2>
            <div class="h-1 w-32 bg-gradient-to-r from-magenta-600 to-transparent"></div>
        </div>

        <form method="POST" class="cyber-card p-8 rounded-none neon-border-magenta">
            <div class="space-y-6">
                <div>
                    <label
                        for="body"
                        class="block text-sm font-bold uppercase tracking-wide text-cyan-400 mb-3"
                    >▸ Note Content</label>

                    <div class="relative">
                        <textarea
                            id="body"
                            name="body"
                            rows="12"
                            class="w-full bg-opacity-30 bg-gray-900 border-2 border-cyan-400 text-lime-400 placeholder-gray-600 p-4 rounded-none font-mono focus:outline-none focus:border-magenta-500 focus:ring-0 transition-colors duration-300"
                            placeholder="Enter your thoughts here... [Max 1000 characters]"
                        ><?= e($_POST['body'] ?? '') ?></textarea>
                        
                        <?php if (isset($errors['csrf'])) : ?>
                            <p class="text-red-500 text-xs mt-3 font-mono">✗ ERROR: <?= e($errors['csrf']) ?></p>
                        <?php endif; ?>
                        
                        <?php if (isset($errors['body'])) : ?>
                            <p class="text-red-500 text-xs mt-3 font-mono">✗ ERROR: <?= e($errors['body']) ?></p>
                        <?php endif; ?>
                        
                        <div class="mt-2 text-right text-cyan-400 text-xs font-mono">
                            <span id="char-count">0</span>/1000
                        </div>
                    </div>
                </div>
            </div>

            <!-- CSRF Token -->
            <input type="hidden" name="csrf_token" value="<?= e($csrf_token) ?>">

            <div class="mt-8 flex gap-4">
                <button
                    type="submit"
                    class="btn-cyber px-8 py-3 rounded-none"
                >
                    ➜ TRANSMIT NOTE
                </button>
                <a href="/notes" class="px-8 py-3 border-2 border-gray-600 text-gray-400 hover:border-cyan-400 hover:text-cyan-400 rounded-none transition-all duration-300 font-bold uppercase text-sm">
                    ◄ CANCEL
                </a>
            </div>
        </form>
    </div>

    <script>
        const textarea = document.getElementById('body');
        const charCount = document.getElementById('char-count');
        
        textarea.addEventListener('input', function() {
            charCount.textContent = this.value.length;
        });
        
        // Initialize count
        charCount.textContent = textarea.value.length;
    </script>
</main>

<?php require base_path('views/partials/footer.php') ?>
