<?php include __DIR__ . "/../partials/_header.php" ?>

<section class="container mx-auto mt-12 p-4 bg-white shadow-md border border-gray-200 rounded">
    <div class="flex items-center justify-between border-b border-gray-200 pb-4">
        <h4 class="text-2xl font-black">Buchungen</h4>
    </div>
    <?php if (empty($bookings)) : ?>
        <h4 class="text-xl text-gray-900">Keine Buchungen</h4>
    <?php else : ?>
        <?php foreach ($bookings as $key => $booking) : ?>
            <table class="table-auto min-w-full divide-y divide-gray-300 mt-6">
                <thead class="bg-indigo-50">
                <tr>
                    <?php if (!empty($booking["tour"])) : ?>
                        <th class="p-4 text-left text-sm font-semibold text-gray-900">
                            Ziel
                        </th>
                        <th class="p-4 text-left text-sm font-semibold text-gray-900">
                            Datum
                        </th>
                    <?php endif; ?>

                    <?php if (!empty($booking["travel"])) : ?>
                        <th class="p-4 text-left text-sm font-semibold text-gray-900">
                            Abfahrtszeit
                        </th>
                        <th class="p-4 text-left text-sm font-semibold text-gray-900">
                            Ankunftszeit
                        </th>
                        <th class="p-4 text-left text-sm font-semibold text-gray-900">
                            Stops
                        </th>
                    <?php endif; ?>

                    <?php if (!empty($booking["bus"])) : ?>
                        <th class="p-4 text-left text-sm font-semibold text-gray-900">
                            Bus
                        </th>
                    <?php endif; ?>

                    <?php if (!empty($booking["accommodation"])) : ?>
                        <th class="p-4 text-left text-sm font-semibold text-gray-900">
                            Unterkunft
                        </th>
                    <?php endif; ?>
                    <?php if (!empty($booking["tour"])) : ?>
                        <th class="p-4 text-left text-sm font-semibold text-gray-900">
                            Preis
                        </th>
                    <?php endif; ?>
                    <th>Aktionen</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                <tr>
                    <?php if (!empty($booking["tour"])) : ?>
                        <!-- Ziel -->
                        <td class="p-4 text-sm text-gray-600"><?= $booking["tour"][0]["start_city"] . " nach " . $booking["tour"][0]["end_city"] ?></td>
                        <!-- Datum -->
                        <td class="p-4 text-sm text-gray-600">
                            <?php
                            $date = new DateTime($booking["tour"][0]["date"]);
                            echo $date->format('d-m-Y');
                            ?>
                        </td>
                    <?php endif; ?>
                    <?php if (!empty($booking["travel"])) : ?>
                        <!-- Abfahrtszeit -->
                        <td class="p-4 text-sm text-gray-600"><?= $booking["travel"]["departure_time"] ?></td>
                        <!-- Ankunftszeit -->
                        <td class="p-4 text-sm text-gray-600"><?= $booking["travel"]["arrival_time"] ?></td>
                        <!-- Stops -->
                        <td class="p-4 text-sm text-gray-600"><?= $booking["travel"]["stops"] ?></td>
                    <?php endif; ?>
                    <?php if (!empty($booking["bus"])) : ?>
                        <!-- Bus -->
                        <td class="p-4 text-sm text-gray-600"><?= $booking["bus"][0]["register_plate"] ?></td>
                    <?php endif; ?>
                    <?php if (!empty($booking["accommodation"])) : ?>
                        <!-- Unterkunft -->
                        <td class="p-4 text-sm text-gray-600"><?= $booking["accommodation"][0]["type"] . " " . $booking["accommodation"][0]["name"] ?></td>
                    <?php endif; ?>

                    <?php if (!empty($booking["tour"])) : ?>
                        <!-- Preis -->
                        <td class="p-4 text-sm font-black"><?= $booking["tour"][0]["price"] . " €" ?></td>
                    <?php endif; ?>
                    <td class="p-4 text-sm text-gray-600 flex justify-center space-x-2">
                        <?php if (!empty($booking["tour"]) && !empty($booking["travel"]) && !empty($booking["bus"]) && !empty($booking["accommodation"])) : ?>
                            <a href="#" id="addBooking" data-booking-id="<?= $key ?>"
                               class="p-2 bg-emerald-50 text-xs text-emerald-900 hover:bg-emerald-500 hover:text-white transition rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none"
                                     stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="feather feather-dollar-sign">
                                    <line x1="12" y1="1" x2="12" y2="23"></line>
                                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 1 1 0 7H6"></path>
                                </svg>
                            </a>
                        <?php endif; ?>
                        <a href="/booking/delete?bookingID=<?= $key ?>"
                           class="p-2 bg-emerald-50 text-xs text-emerald-900 hover:bg-emerald-500 hover:text-white transition rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="#FF0000" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-trash-2">
                                <polyline points="3 6 5 6 21 6"></polyline>
                                <path
                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                <line x1="14" y1="11" x2="14" y2="17"></line>
                            </svg>
                        </a>
                    </td>

                </tr>
                </tbody>
            </table>
            <div id="flashMessageContainer" class="flex items-center justify-center mx-auto mt-4 bg-gray-100 text-sky-900"></div>
        <?php endforeach; ?>
    <?php endif; ?>
</section>

<?php include __DIR__ . "/../partials/_footer.php" ?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addButton = document.getElementById('addBooking');

        addButton.addEventListener('click', function() {
            const bookingID = this.getAttribute('data-booking-id');

            fetch('/booking/create', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ id: bookingID }),
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                })
                .then(data => {
                    this.closest('table').remove();
                    displayFlashMessage('success', 'Gebucht!');
                })
                .catch(error => {
                    console.error('Ein Fehler is passiert:', error);
                    displayFlashMessage('error', 'Konnte leider nicht gebucht werden');
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