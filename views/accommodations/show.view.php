<?php include __DIR__ . "/../partials/_header.php" ?>

<section class="container mx-auto mt-12 p-4 bg-white shadow-md border border-gray-200 rounded">
    <div class="container-e">
        <div class="image-container-e">
            <?php if (empty($images)) : ?>
                <img src="https://facadesplus.com/wp-content/uploads/Flare-33.jpg" alt="city image"/>
            <?php else : ?>
                <?php foreach ($images as $image) : ?>
                    <img src="<?= __DIR__ . "/../../uploads/" . $image["name"] ?>"
                         alt="city image"
                         onerror="this.onerror=null; this.src='https://facadesplus.com/wp-content/uploads/Flare-33.jpg';"/>
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
        <a href="/accommodations" class="center text-center block w-20 py-2 mr-3 bg-indigo-600 text-white rounded">Zurück</a>
        <?php if (isset($_SESSION["user"]) && $_SESSION["user"]["role"] != "admin") : ?>
            <button type="button" id="addAccommodationBooking" data-accommodation-id="<?= $accommodation['id'] ?>"
                    class="center text-center block w-20 py-2 mr-3 bg-orange-400 text-white rounded">
                Hinzufügen
            </button>
        <?php endif; ?>
    </div>
    <div id="flashMessageContainer" class="flex items-center justify-center mx-auto mt-4 bg-gray-100 text-sky-900"></div>
</section>

<?php include __DIR__ . "/../partials/_footer.php" ?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const addButton = document.getElementById('addAccommodationBooking');

        addButton.addEventListener('click', function () {
            const accommodationID = this.getAttribute('data-accommodation-id');

            fetch('/accommodation/booking', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({id: accommodationID}),
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
        container.innerHTML = ''; // Clear previous messages

        const flashMessage = document.createElement('div');
        flashMessage.textContent = message;

        // Add classes based on the message type
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

