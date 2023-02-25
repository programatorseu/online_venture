<?php require base_path('views/includes/header.php'); ?>
<?php require base_path('views/includes/nav.php'); ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="mt-5 md:col-span-2 md:mt-0">
                <form method="POST" action="/articles/store">
                    <div class="shadow sm:overflow-hidden sm:rounded-md">
                        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700">Title of Article: </label>
                                <div class="mt-1">
                                    <input type="text" name="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Type name of programmer">
                                    <?php if (isset($errors['title'])) : ?>
                                        <p class="text-red-500 text-xs mt-2">
                                            <?= $errors['title'] ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Body of Article: </label>
                                <div class="mt-1">
                                    <textarea name="body" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Type something about article"></textarea>
                                    <?php if (isset($errors['body'])) : ?>
                                        <p class="text-red-500 text-xs mt-2">
                                            <?= $errors['body'] ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="flex justify-center">
  <div class="mb-3 block w-full">
  <label for="author" class="block text-sm font-medium text-gray-700">Name of Author: </label>
    <select name="author" class="block w-full" data-te-select-init>
    <?php foreach($authors as $author): ?>
        <option value="<?php echo $author['id']; ?>"><?= $author['name']; ?></option> 

    <?php endforeach; ?>    
  
    </select>
  </div>
</div>
                        </div>

                        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                            <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>


<?php require base_path('views/includes/footer.php') ?>