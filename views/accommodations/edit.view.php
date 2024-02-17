<?php include __DIR__ . "/../partials/_header.php" ?>
    <section class="max-w-2xl mx-auto mt-12 p-4 bg-white shadow-md border border-gray-200 rounded">
        <div class="flex items-center justify-between border-b border-gray-200 pb-4">
            <h4 class="text-2xl font-black">Unterkünt</h4>
        </div>
        <form method="POST" action="/accommodation" class="grid grid-cols-1 gap-6" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="id" value="<?= $accommodation["id"] ?>">
            <div class="container-e">
                <div class="info-container-e">
                    <label class="block mb-4">
                        <span class="text-gray-700">Name</span>
                        <input name="name" type="text"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                               value="<?= $accommodation["name"] ?>"
                        />
                    </label>
                    <label class="block mb-4">
                        <span class="text-gray-700">Art</span>
                        <input name="type" type="text"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                               value="<?= $accommodation["type"] ?>"
                        />
                    </label>
                    <label class="block mb-4">
                        <span class="text-gray-700">Stadt</span>
                        <input name="city" type="text"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                               value="<?= $accommodation["city"] ?>"
                        />
                    </label>
                    <label class="block mb-4">
                        <span class="text-gray-700">Verfügbare Zimmer</span>
                        <input name="available_rooms" type="number"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                               value="<?= $accommodation["available_rooms"] ?>"
                        />
                    </label>
                </div>
                <div class="image-container-e">
                    <label class="block">
                        <span class="text-gray-700">Bild hochladen</span>
                        <input name="image[]" type="file" multiple
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        />
                    </label>
                </div>
            </div>
            <button type="submit" class="block w-full py-2 bg-indigo-600 text-white rounded">
                Speichern
            </button>
        </form>
    </section>
<?php include __DIR__ . "/../partials/_footer.php" ?>