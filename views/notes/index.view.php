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

        <div class="space-y-2">
            <?php foreach ($notes as $note) : ?>
                <div class="card bg-base-100 shadow-md">
                    <div class="card-body p-4">
                        <a href="/note?id=<?= $note['id'] ?>" class="card-title text-lg hover:text-primary">
                            <?= htmlspecialchars($note['body']) ?>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-6">
            <a href="/notes/create" class="btn btn-primary">Create Note</a>
        </div>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>
