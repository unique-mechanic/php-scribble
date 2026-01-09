<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <?php if ($success) : ?>
            <div id="success-message" class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded transition-opacity duration-500">
                <?= htmlspecialchars($success) ?>
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

        <ul>
            <?php foreach ($notes as $note) : ?>
                <li>
                    <a href="/note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline">
                        <?= htmlspecialchars($note['body']) ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>

        <p class="mt-6">
            <a href="/notes/create" class="text-blue-500 hover:underline">Create Note</a>
        </p>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>
