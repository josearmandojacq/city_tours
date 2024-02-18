<?php include __DIR__ . "/../partials/_header.php" ?>

<section class="container mx-auto mt-12 p-4 bg-white shadow-md border border-gray-200 rounded">
    <div class="container-e">
        <div class="image-container-e">
            <?php if (empty($images)) : ?>
                <img src="https://images.ctfassets.net/rfvr9frkpq1f/5WmJfaOWUl1BO1s8NaNG8u/a8fe3efb05106814b6c0b95bfcc310e5/hero2.jpg?fm=jpg" alt="bus image"/>
            <?php else : ?>
                <?php foreach ($images as $image) : ?>
                    <img src="<?= __DIR__ . "/../../uploads/" . $image["name"] ?>"
                         alt="city image"
                         onerror="this.onerror=null; this.src='https://images.ctfassets.net/rfvr9frkpq1f/5WmJfaOWUl1BO1s8NaNG8u/a8fe3efb05106814b6c0b95bfcc310e5/hero2.jpg?fm=jpg';"/>
                <?php endforeach; ?>
            <?php endif; ?>
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
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="flex items-center justify-center my-6 pb-4">
        <a href="/buses" class="center text-center block w-20 py-2 mr-3 bg-indigo-600 text-white rounded">Zurück</a>
        <?php if (isset($_SESSION["user"]) && $_SESSION["user"]["role"] != "admin") : ?>
            <button type="button" id="addBusBooking" data-bus-id="<?= $bus['id'] ?>"
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
        const addButton = document.getElementById('addBusBooking');

        addButton.addEventListener('click', function() {
            const busId = this.getAttribute('data-bus-id');

            fetch('/bus/booking', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ id: busId }),
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


