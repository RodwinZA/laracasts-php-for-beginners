<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/banner.php") ?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

            <div>
                    <div class="mt-5 md:col-span-2 md:mt-0">
                        <form method="POST" action="/notes" >
                            <div class="shadow sm:overflow-hidden sm:rounded-md">

                                <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                                    <div>
                                        <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Body</label>
                                        <div class="mt-2">
                                            <textarea id="body" name="body" rows="3" class="mt-1 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:py-1.5 sm:text-sm sm:leading-6" placeholder="your note goes here...">
                                                <?= $_POST['body'] ?? '' ?>
                                            </textarea>

                                            <?php if (isset($errors['body'])) : ?>
                                                <p class="text-red-500 text-sm mt-5">
                                                    <?= $errors['body'] ?>
                                                </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                                    <button type="submit" class="inline-flex justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Save</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </main>

<?php require base_path("views/partials/footer.php") ?>