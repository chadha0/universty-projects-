
<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php')?>

<main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="mt-5 md:col-span-2 md:mt-0">
                <form  action='/uploads/image' method="post" enctype="multipart/form-data" >
                    <div class="shadow sm:overflow-hidden sm:rounded-md">
                        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                            <div>
                                <label for="file_input" class="block text-sm font-medium text-gray-700">Upload Image</label>
                                <div class="mt-1">
                                  
        <input 
           class="block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
            aria-describedby="file_input_help" id="file_input" type="file" name="image">
        <p class="mt-2 text-lg text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                                </div>
                            </div>
                        </div>
                          <?php if(isset($errors['image'])): ?>
                              
                              <p class="text-red-500 text-xs mt-2" ><?= $errors['image'] ?></p>
                          <?php endif; ?>
                        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
  
                            <button type="submit"
                                    class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                Save
                            </button>
                        </div>

                                <div class="mt-1">

                                </div>

                    </div>
                </form>

            </div>
        </div>
    </div>


    
</main>

<?php require base_path('views/partials/footer.php') ?>
