<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p>Hello. Welcome to the home page.</p>

        <!-- CONCEPT 6: Arrays and Methods -->
        <!-- We received $recentNotes array from the controller -->
        
        <section class="mt-10">
            <h2 class="text-2xl font-bold mb-4">📝 Recent Notes</h2>
            
            <?php if (count($recentNotes) > 0): ?>
                <!-- CONCEPT 7: Looping through arrays with foreach -->
                <!-- Each iteration: $note contains one item from the array -->
                <div class="space-y-3">
                    <?php foreach ($recentNotes as $note): ?>
                        <div class="card bg-base-100 shadow-md">
                            <div class="card-body p-4">
                                <a href="/note?id=<?= $note['id'] ?>" class="card-title text-lg hover:text-primary">
                                    <!-- $note is an associative array (dictionary) -->
                                    <!-- Access data with ['key'] syntax -->
                                    <? if (strlen($note['body']) > 100): ?>
                                    <?= htmlspecialchars(substr($note['body'], 0, 100)) ?>...
                                    <? else: ?>
                                    <?= htmlspecialchars($note['body']) ?>
                                    <? endif; ?>
                                </a>
                                <p class="text-gray-400 text-xs mt-2">
                                    Note ID: <?= $note['id'] ?> | User ID: <?= $note['user_id'] ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <!-- If array is empty, show this message -->
                <p class="text-gray-500">No notes yet. <a href="/notes/create" class="btn btn-sm btn-primary">Create one!</a></p>
            <?php endif; ?>
        </section>
    </div>
</main>

<?php require('partials/footer.php') ?>
