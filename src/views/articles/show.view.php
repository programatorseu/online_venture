<?php require base_path('views/includes/header.php'); ?>
<?php require base_path('views/includes/nav.php'); ?>

<main>
<div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p class="mb-6">
            <a href="/articles" class="text-blue-500 underline">go back...</a>
        </p>
        <article>
            <h2><?= output($article['title']); ?></h2>
            <span class="font-l">
                <?=output($article['creation_date']);?>
            </span>
            <p><?=output($article['body']);?></p>
            <p>Author: <b><?= output($article['name']);?></b></p>
        </article>
    </div>
</main>
</main>


<?php require base_path('views/includes/footer.php') ?>