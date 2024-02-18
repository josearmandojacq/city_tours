<?php include __DIR__ . "/../partials/_header.php" ?>

<section class="container mx-auto mt-12 p-4 bg-white shadow-md border border-gray-200 rounded">
    <div id="tourDetails" data-tour-id="<?= $tour['id'] ?>"></div>
    <div class="container-e">
        <div class="image-container-e">
            <?php if(empty($images)) : ?>
                <img src="https://cdn.pixabay.com/photo/2013/03/02/02/41/alley-89197_1280.jpg" alt="city image" />
            <?php else : ?>
                <?php foreach ($images as $image) : ?>
                    <img src="<?= __DIR__ . "/../../uploads/" . $image["name"] ?>"
                         alt="city image"
                         onerror="this.onerror=null; this.src='https://cdn.pixabay.com/photo/2013/03/02/02/41/alley-89197_1280.jpg';"
                    />
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="info-container-e">
            <p class="text-2xl font-black"><?= $tour["start_city"] . " -> " . $tour["end_city"] ?></p>
            <p class="text-xl text-gray-700"><?= "Preis: " .  $tour["price"]?></p>
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
    <div class="flex items-center justify-center my-6 pb-4">
        <a href="/" class="center text-center block w-20 py-2 mr-3 bg-indigo-600 text-white rounded">Zurück</a>
        <?php if (isset($_SESSION["user"]) && $_SESSION["user"]["role"] != "admin") : ?>
            <button type="button" id="addTourBooking" data-tour-id="<?= $tour['id'] ?>"
                    class="center text-center block w-20 py-2 mr-3 bg-orange-400 text-white rounded">
                Hinzufügen
            </button>
        <?php endif; ?>
    </div>
    <div id="flashMessageContainer" class="flex items-center justify-center mx-auto mt-4 bg-gray-100 text-sky-900"></div>
</section>

<?php include __DIR__ . "/../partials/_footer.php" ?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addButton = document.getElementById('addTourBooking');

        addButton.addEventListener('click', function() {
            const tourID = this.getAttribute('data-tour-id');
            fetch('/tour/booking', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ id: tourID }),
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    displayFlashMessage('success', 'Zur Buchung richtig hinzugefügt!');
                })
                .catch(error => {
                    console.error('Error:', error);
                    displayFlashMessage('error', 'Konnte leider nicht hinzugefügt werden');
                });
        });
    });

    function displayFlashMessage(type, message) {
        const container = document.getElementById('flashMessageContainer');
        container.innerHTML = '';

        const flashMessage = document.createElement('div');
        flashMessage.textContent = message;

        if (type === 'success') {
            flashMessage.className = 'p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg';
        } else if (type === 'error') {
            flashMessage.className = 'p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg';
        }

        container.appendChild(flashMessage);

        setTimeout(() => {
            flashMessage.remove();
        }, 5000);
    }
</script>
