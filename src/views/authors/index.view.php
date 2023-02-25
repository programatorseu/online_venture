<?php require base_path('views/includes/header.php'); ?>
<?php require base_path('views/includes/nav.php'); ?>

<main>
<div class="p-8">
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Imie 
                </th>
                <th scope="col" class="px-6 py-3">
                    email
                </th>
                <th scope="col" class="px-6 py-3">
                    ilosc artykułów
                </th>

            </tr>
        </thead>
        <tbody>
<?php foreach($authors as $author): ?>
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   <?= output($author['name']); ?>
                </th>
                <td class="px-6 py-4">
                <?= output($author['email']); ?>
                </td>
                <td class="px-6 py-4">
                <?= output($author['nums']); ?>
                </td>
    
            </tr>
            <?php endforeach;?>   
        </tbody>
    </table>
</div>

 


</div>

</main>
    
<?php require base_path('views/includes/footer.php') ?>
