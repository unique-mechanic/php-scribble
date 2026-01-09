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
                <ul class="space-y-3">
                    <?php foreach ($recentNotes as $note): ?>
                        <li class="p-4 bg-blue-50 rounded border border-blue-200">
                            <h3 class="font-semibold text-lg">
                                <a href="/note?id=<?= $note['id'] ?>" class="text-blue-600 hover:underline">
                                    <!-- $note is an associative array (dictionary) -->
                                    <!-- Access data with ['key'] syntax -->
                                    <?= htmlspecialchars($note['title']) ?>
                                </a>
                            </h3>
                            <p class="text-gray-600 text-sm mt-2">
                                <?= htmlspecialchars(substr($note['body'], 0, 100)) ?>...
                            </p>
                            <p class="text-gray-400 text-xs mt-2">
                                Created: <?= $note['created_at'] ?>
                            </p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <!-- If array is empty, show this message -->
                <p class="text-gray-500">No notes yet. <a href="/notes/create" class="text-blue-600">Create one!</a></p>
            <?php endif; ?>
        </section>
    </div>
</main>

<?php require('partials/footer.php') ?>
