<?php require base_path('views/includes/header.php'); ?>
<?php require base_path('views/includes/nav.php'); ?>

<main>
<div class="p-8">
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Tytuł 
                </th>
                <th scope="col" class="px-6 py-3">
                    Tekst
                </th>
                <th scope="col" class="px-6 py-3">
                    Autor
                </th>
                <th scope="col" class="px-6 py-3">
                    Data utworzenia
                </th>
                <th scope="col" class="px-6 py-3">
                    Akcja
                </th>
            </tr>
        </thead>
        <tbody>
<?php foreach($articles as $article): ?>
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <a href="/article?id=<?= $article['id']; ?>"><?= output($article['title']); ?></a>
                </th>
                <td class="px-6 py-4">
                <?= output($article['body']); ?>
                </td>
                <td class="px-6 py-4">
                <?= output($article['name']); ?>
                </td>
                <td class="px-6 py-4">
                    <?= output($article['creation_date']); ?>
                </td>
                <td class="px-6 py-4">
                    <a href="/article/edit?id=<?= $article['id'];?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            <?php endforeach;?>   
        </tbody>
    </table>
</div>

 


</div>

</main>
    
<?php require base_path('views/includes/footer.php') ?>
