<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-md py-12">
        <div class="mb-8">
            <h2 class="text-3xl font-bold glow-magenta mb-2">▸ LOGIN</h2>
            <div class="h-1 w-20 bg-gradient-to-r from-magenta-600 to-transparent"></div>
        </div>

        <?php if (isset($errors['csrf'])) : ?>
            <div class="mb-6 p-4 border-2 border-red-500 bg-red-900 bg-opacity-20 rounded-none">
                <p class="text-red-400 font-mono text-sm">✗ ERROR: <?= $errors['csrf'] ?></p>
            </div>
        <?php endif; ?>

        <form method="POST" class="cyber-card p-8 rounded-none neon-border-magenta">
            <div class="space-y-6">
                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-sm font-bold uppercase tracking-wide text-cyan-400 mb-2">
                        ▸ Email
                    </label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="<?= isset($email) ? \Core\Security::html($email) : '' ?>"
                        class="w-full bg-opacity-30 bg-gray-900 border-2 border-cyan-400 text-lime-400 placeholder-gray-600 p-3 rounded-none font-mono focus:outline-none focus:border-magenta-500 focus:ring-0 transition-colors duration-300"
                        placeholder="user@example.com"
                    />
                    <?php if (isset($errors['email'])) : ?>
                        <p class="text-red-500 text-xs mt-2 font-mono">✗ ERROR: <?= $errors['email'] ?></p>
                    <?php endif; ?>
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-bold uppercase tracking-wide text-cyan-400 mb-2">
                        ▸ Password
                    </label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="w-full bg-opacity-30 bg-gray-900 border-2 border-cyan-400 text-lime-400 placeholder-gray-600 p-3 rounded-none font-mono focus:outline-none focus:border-magenta-500 focus:ring-0 transition-colors duration-300"
                        placeholder="••••••••"
                    />
                    <?php if (isset($errors['password'])) : ?>
                        <p class="text-red-500 text-xs mt-2 font-mono">✗ ERROR: <?= $errors['password'] ?></p>
                    <?php endif; ?>
                </div>

                <!-- Login Error -->
                <?php if (isset($errors['login'])) : ?>
                    <div class="p-3 border-2 border-red-500 bg-red-900 bg-opacity-20 rounded-none">
                        <p class="text-red-400 text-sm font-mono">✗ <?= $errors['login'] ?></p>
                    </div>
                <?php endif; ?>

                <!-- CSRF Token -->
                <input type="hidden" name="csrf_token" value="<?= \Core\Security::html($csrf_token) ?>">
            </div>

            <button
                type="submit"
                class="mt-8 btn-cyber w-full px-6 py-3 rounded-none"
            >
                ➜ LOGIN
            </button>

            <p class="mt-6 text-center text-gray-400 text-sm">
                Demo: Use any email and password "password" (test account should exist in database)
            </p>
        </form>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>
