<?php include __DIR__ . "/../partials/_header.php" ?>
    <section class="max-w-2xl mx-auto mt-12 p-4 bg-white shadow-md border border-gray-200 rounded">
        <div class="flex items-center justify-between border-b border-gray-200 pb-4">
            <h4 class="font-medium">Tour</h4>
        </div>
        <form method="POST" action="/tour" class="grid grid-cols-1 gap-6" enctype="multipart/form-data">
            <div class="container-e">
                <div class="info-container-e">
                    <label class="block">
                        <span class="text-gray-700">Ziel</span>
                        <input name="end_city" type="text"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        />
                    </label>
                    <label class="block">
                        <span class="text-gray-700">Start</span>
                        <input name="start_city" type="text"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        />
                    </label>
                    <label class="block">
                        <span class="text-gray-700">Datum</span>
                        <input name="date" type="date"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        />
                    </label>
                    <label class="block">
                        <span class="text-gray-700">Beschreibung</span>
                        <input name="description" type="text"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        />
                    </label>
                    <label class="block">
                        <span class="text-gray-700">Preis</span>
                        <input name="price" type="number"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        />
                    </label>
                    <label class="block">
                        <span class="text-gray-700">Abfahrtzeit</span>
                        <input name="departure_time" type="time"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        />
                    </label>
                    <label class="block">
                        <span class="text-gray-700">Ankunftszeit</span>
                        <input name="arrival_time" type="time"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        />
                    </label>
                    <label class="block">
                        <span class="text-gray-700">Stops</span>
                        <input name="stops" type="text"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                               placeholder="Stop 1, Stop 2, ..."
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