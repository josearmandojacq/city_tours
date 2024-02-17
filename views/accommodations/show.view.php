<?php include __DIR__ . "/../partials/_header.php" ?>

<section class="container mx-auto mt-12 p-4 bg-white shadow-md border border-gray-200 rounded">
    <div class="container-e">
        <div class="image-container-e">
            <?php if(empty($images)) : ?>
            <img src="https://facadesplus.com/wp-content/uploads/Flare-33.jpg" alt="city image"/>
            <?php else : ?>
                <?php foreach ($images as $image) : ?>
                    <img src="<?= __DIR__. "/../../uploads/". $image["name"] ?>"
                         alt="city image"
                         onerror="this.onerror=null; this.src='https://facadesplus.com/wp-content/uploads/Flare-33.jpg';" />
                <?php endforeach; ?>
            <?php endif; ?>

        </div>
        <div class="info-container-e">
            <p class="text-2xl font-black"><?= $accommodation["type"] . " " . $accommodation["name"] ?></p>
            <table class="times text-medium">
                <thead class="text-xl bg-gray-50">
                <tr>
                    <th>City</th>
                    <th>Available Rooms</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                <tr>
                    <td class="p-4 text-xl text-gray-600">
                        <?= $accommodation["city"] ?>
                    </td>
                    <td class="p-4 text-xl text-gray-600">
                        <?= $accommodation["available_rooms"] ?>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="flex items-center justify-center my-6 pb-4">
        <a href="/accommodations" class="center text-center block w-20 py-2 bg-indigo-600 text-white rounded">Zurück</a>
    </div>
</section>

<?php include __DIR__ . "/../partials/_footer.php" ?>



