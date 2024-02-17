<?php include __DIR__ . "/../partials/_header.php" ?>

<section class="container mx-auto mt-12 p-4 bg-white shadow-md border border-gray-200 rounded">
    <div id="tourDetails" data-tour-id="<?= $tour['id'] ?>"></div>
    <div class="container-e">
        <div class="image-container-e">
            <?php foreach ($images as $image) : ?>
                <img src="<?= __DIR__ . "/../../uploads/" . $image["name"] ?>" alt="city image"/>
            <?php endforeach; ?>
        </div>
        <div class="info-container-e">
            <p class="text-2xl font-black"><?= $tour["start_city"] . " -> " . $tour["end_city"] ?></p>
            <table class="times text-medium">
                <thead class="text-xl bg-gray-50">
                <tr>
                    <th>Abfahrtszeit</th>
                    <th>Ankunftszeit</th>
                    <th>Haltestellen</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                <?php foreach ($travels as $travel) : ?>
                    <tr>
                        <td class="p-4 text-xl text-gray-600">
                            <?php
                            $date = new DateTime($travel["departure_time"]);
                            echo $date->format('H:i');
                            ?>
                        </td>
                        <td class="p-4 text-xl text-gray-600">
                            <?php
                            $date = new DateTime($travel["arrival_time"]);
                            echo $date->format('H:i');
                            ?>
                        </td>
                        <td class="p-4 text-xl text-gray-600">
                            <?php
                            echo str_replace(",", "-", $travel["stops"])
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <p class="py-4 text-xl text-gray-600"><?= $tour["description"] ?></p>
        </div>
    </div>

</section>

<?php include __DIR__ . "/../partials/_footer.php" ?>


