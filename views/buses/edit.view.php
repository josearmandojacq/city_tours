<?php include __DIR__ . "/../partials/_header.php" ?>
    <section class="max-w-2xl mx-auto mt-12 p-4 bg-white shadow-md border border-gray-200 rounded">
        <div class="flex items-center justify-between border-b border-gray-200 pb-4">
            <h4 class="text-2xl font-black">Bus</h4>
        </div>
        <form method="POST" action="/bus" class="grid grid-cols-1 gap-6" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="id" value="<?= $bus["id"] ?>">
            <div class="container-e">
                <div class="info-container-e">
                    <label class="block mb-4">
                        <span class="text-gray-700">Kennzeichen</span>
                        <input name="register_plate" type="text"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                               value="<?= $bus["register_plate"] ?>"
                        />
                    </label>
                    <fieldset class="mb-4">
                        <legend class="text-gray-700">Ausstattung:</legend>
                        <input type="hidden" name="wlan" value="0">
                        <input type="hidden" name="toilet" value="0">
                        <input type="hidden" name="air_conditioner" value="0">
                        <input type="hidden" name="power_outlet" value="0">
                        <input type="hidden" name="entertainment" value="0">
                        <input type="hidden" name="board_service" value="0">
                        <input type="hidden" name="booked" value="0">
                        <div>
                            <input name="wlan" type="checkbox" id="wlan" class="mr-3 rounded-md" value="1" <?php echo $bus["wlan"] == 1 ? "checked" : ""?>/>
                            <label for="wlan">Wlan</label>
                        </div>
                        <div>
                            <input name="toilet" type="checkbox" id="toilet" class="mr-3 rounded-md" value="1" <?php echo $bus["toilet"] == 1 ? "checked" : ""?>/>
                            <label for="toilet">Toilette</label>
                        </div>
                        <div>
                            <input name="air_conditioner" type="checkbox" id="air_conditioner" class="mr-3 rounded-md" value="1" <?php echo $bus["air_conditioner"] == 1 ? "checked" : ""?>/>
                            <label for="air_conditioner">Klimaanlage</label>
                        </div>
                        <div>
                            <input name="power_outlet" type="checkbox" id="power_outlet" class="mr-3 rounded-md" value="1" <?php echo $bus["power_outlet"] == 1 ? "checked" : ""?>/>
                            <label for="power_outlet">Steckdose</label>
                        </div>
                        <div>
                            <input name="entertainment" type="checkbox" id="entertainment" class="mr-3 rounded-md" value="1" <?php echo $bus["entertainment"] == 1 ? "checked" : ""?>/>
                            <label for="entertainment">Unterhaltungssystem</label>
                        </div>
                        <div>
                            <input name="board_service" type="checkbox" id="board_service" class="mr-3 rounded-md" value="1" <?php echo $bus["board_service"] == 1 ? "checked" : ""?>/>
                            <label for="board_service">Bordservice</label>
                        </div>
                        <div>
                            <input name="booked" type="checkbox" id="booked" class="mr-3 rounded-md" value="1" <?php echo $bus["booked"] == 1 ? "checked" : ""?>/>
                            <label for="booked">Gebucht?</label>
                        </div>
                    </fieldset>
                    <label class="block mb-4">
                        <span class="text-gray-700">Sitzplätze</span>
                        <input name="seats" type="number"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                               value="<?= $bus["seats"] ?>"
                        />
                    </label>
                    <label class="block mb-4">
                        <span class="text-gray-700">Verfügbarkeit</span>
                        <input name="availability" type="date"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                               value="<?php $date = new DateTime($bus["availability"]); echo $date->format('Y-m-d'); ?>"
                        />
                    </label>
                    <label class="block mb-4">
                        <span class="text-gray-700">Verbinde mit einem Tour(Tour ID)</span>
                        <input name="tour_id" type="number"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                               value="<?= $bus["tour_id"] ?? "" ?>"
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