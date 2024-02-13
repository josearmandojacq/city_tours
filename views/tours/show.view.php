<?php include __DIR__ . "/../partials/_header.php" ?>

<section class="container mx-auto mt-12 p-4 bg-white shadow-md border border-gray-200 rounded">
    <div class="container-e">
        <div class="image-container-e">
            <?php foreach ($images as $image) : ?>
                <img src="<?= __DIR__ . "/../../uploads/go1_logo.jpeg" ?>" alt="city image"/>
            <?php endforeach; ?>
        </div>
        <div class="info-container-e">
            <h1><?= $tour["start_city"] . " -> " . $tour["end_city"] ?></h1>
            <table class="table-auto min-w-full divide-y divide-gray-300 mt-6">
                <thead class="bg-gray-50">
                <tr>
                    <th>Abfahrtszeit</th>
                    <th>Ankunftszeit</th>
                    <th>Haltestellen</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                <?php foreach ($travels as $travel) : ?>
                    <tr>
                        <td class="p-4 text-sm text-gray-600">
                            <?php
                            $date = new DateTime($travel["departure_time"]);
                            echo $date->format('H:i');
                            ?>
                        </td>
                        <td class="p-4 text-sm text-gray-600">
                            <?php
                            $date = new DateTime($travel["arrival_time"]);
                            echo $date->format('H:i');
                            ?>
                        </td>
                        <td class="p-4 text-sm text-gray-600">
                            <?php
                            echo str_replace(",", "-", $travel["stops"])
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <p><?= $tour["description"] ?></p>
        </div>
    </div>

    <h3>Unsere busse bringen sie sicher und schnell ans Ziel</h3>
    <p>Wählen sie die Gewünschte Ausstattung</p>
    <form method="GET" class="mt-4 w-full">
        <div class="checkbox-group text-big">
            <label for="wifi">
                <input type="checkbox" id="wifi" name="wlan" value="1"> WLAN
            </label>
            <label for="toilet">
                <input type="checkbox" id="toilet" name="toilet" value="1"> Toilette
            </label>
            <label for="power_socket">
                <input type="checkbox" id="power_socket" name="power_outlet" value="1">Steckdose
            </label>
            <label for="air_conditioning">
                <input type="checkbox" id="air_conditioning" name="air_conditioner" value="1">Klimaanlage
            </label>
            <label for="entertainment_system">
                <input type="checkbox" id="entertainment_system" name="entertainment_system" value="1">
                Unterhaltungssystem
            </label>
            <label for="accessibility">
                <input type="checkbox" id="accessibility" name="accessibility" value="1">
                Barrierefreiheit
            </label>
            <label for="board_service">
                <input type="checkbox" id="board_service" name="board_service" value="1">
                Bordservice
            </label>
        </div>
        <button type="submit" id="filterResults" class="block w-full py-2 bg-indigo-600 text-white rounded">Filtern</button>
    </form>
    <div id="filteredResults"></div>
    <section class="buses">
        <div class="center-div">
            <?php foreach ($buses as $bus) : ?>
                <div class="bus text-big" id="bus1">
                    <img src="https://dummyimage.com/300x200/a1c9e6/000000&text=Bus" alt="Stadtbild München"/>
                    <br>
                    <span><?= $bus["register_plate"] ?></span>
                    <br>
                    <span><?= "Frei Plätze: " . $bus["seats"] ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <section class="accommodations">
        <h3><?= "Unterkünfte in " . ucfirst($tour["end_city"]) ?></h3>
        <div class="center-div">
            <?php foreach ($accommodations as $accommodation) : ?>
                <div class="accommodation text-big" id="accommodation1">
                    <img src="https://dummyimage.com/300x200/a1c9e6/000000&text=Bus" alt="Stadtbild München"/>
                    <br>
                    <span><?= ucfirst($accommodation["type"]) . " " . ucfirst($accommodation["name"]) ?></span>
                </div>
            <?php endforeach; ?>
            <br>
        </div>
    </section>
    <div class="center-div">
        <p></p>
        <button type="button" class="block w-full py-2 bg-indigo-600 text-white rounded">Für nur <b><?= $tour["price"] . " €" ?></b> inkl. Mwst <br> <b>Jetzt
                Buchen <b>
        </button>
    </div>
</section>


<?php include __DIR__ . "/../partials/_footer.php" ?>