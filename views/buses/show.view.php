<?php include __DIR__ . "/../partials/_header.php" ?>

<section class="container mx-auto mt-12 p-4 bg-white shadow-md border border-gray-200 rounded">
    <div class="container-e">
        <div class="image-container-e">
        </div>
        <div class="info-container-e">
            <p class="text-2xl font-black"><?= $bus["register_plate"] ?></p>
            <p class="text-sm text-gray-700">
                <?php $date = new DateTime($bus["availability"]);
                echo "Verfügbarkeit: " . $date->format('Y-m-d'); ?>
            </p>
            <table class="times text-medium">
                <thead class="text-xl bg-gray-50">
                <tr>
                    <th>Wlan</th>
                    <th>Toilette</th>
                    <th>Steckdose</th>
                    <th>Unterhaltungssystem</th>
                    <th>Bordservice</th>
                    <th>Klimaanlage</th>
                    <th>Gebucht?</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                <tr>
                    <td class="p-4 text-xl text-gray-600">
                        <?= $bus["wlan"] == 1 ? "ja" : "nein" ?>
                    </td>
                    <td class="p-4 text-xl text-gray-600">
                        <?= $bus["toilet"] == 1 ? "ja" : "nein" ?>
                    </td>
                    <td class="p-4 text-xl text-gray-600">
                        <?= $bus["power_outlet"] == 1 ? "ja" : "nein" ?>
                    </td>
                    <td class="p-4 text-xl text-gray-600">
                        <?= $bus["entertainment"] == 1 ? "ja" : "nein" ?>
                    </td>
                    <td class="p-4 text-xl text-gray-600">
                        <?= $bus["board_service"] == 1 ? "ja" : "nein" ?>
                    </td>
                    <td class="p-4 text-xl text-gray-600">
                        <?= $bus["air_conditioner"] == 1 ? "ja" : "nein" ?>
                    </td>
                    <td class="p-4 text-xl text-gray-600">
                        <?= $bus["booked"] == 1 ? "ja" : "nein" ?>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="flex items-center justify-center my-6 pb-4">
        <a href="/buses" class="center text-center block w-20 py-2 bg-indigo-600 text-white rounded">Zurück</a>
    </div>
</section>

<?php include __DIR__ . "/../partials/_footer.php" ?>



