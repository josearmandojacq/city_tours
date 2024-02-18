<?php include __DIR__ . "/../partials/_header.php" ?>

<section class="container mx-auto mt-12 p-4 bg-white shadow-md border border-gray-200 rounded">
    <div class="flex items-center justify-between border-b border-gray-200 pb-4">
        <h4 class="text-2xl font-black">Busse</h4>
        <?php if (isset($_SESSION["user"]) && $_SESSION["user"]["role"] === "admin") : ?>
            <a href="/bus/create"
               class="block w-10 py-2 bg-indigo-600 text-white rounded flex justify-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="feather feather-plus">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
            </a>
        <?php endif; ?>
    </div>

    <p class="py-4 text-xl text-gray-600">Wählen sie die gewünschte Ausstattung</p>
    <div class="checkbox-group buses-checkbox text-medium pb-4">
        <label for="wifi">
            <input type="checkbox" id="wifi" name="wlan" value="1"> WLAN
        </label>
        <label for="toilet">
            <input type="checkbox" id="toilet" name="toilet" value="1"> Toilette
        </label>
        <label for="power_socket">
            <input type="checkbox" id="power_outlet" name="power_outlet" value="1">Steckdose
        </label>
        <label for="air_conditioning">
            <input type="checkbox" id="air_conditioner" name="air_conditioner" value="1">Klimaanlage
        </label>
        <label for="entertainment_system">
            <input type="checkbox" id="entertainment_system" name="entertainment" value="1">
            Unterhaltungssystem
        </label>
        <label for="board_service">
            <input type="checkbox" id="board_service" name="board_service" value="1">
            Bordservice
        </label>
    </div>

    <table class="table-auto min-w-full divide-y divide-gray-300 mt-6">
        <thead class="bg-gray-50">
        <tr>
            <th class="p-4 text-left text-sm font-semibold text-gray-900">
                Kennzeichen
            </th>
            <th class="p-4 text-left text-sm font-semibold text-gray-900">
                Sitzplätze
            </th>
            <th class="p-4 text-left text-sm font-semibold text-gray-900">
                Verfügbarkeit
            </th>
            <th>Aktionen</th>
        </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 bg-white">
        <?php foreach ($buses as $bus) : ?>
            <tr data-bus-id="<?= $bus["id"] ?>" id="bus-table">
                <!-- Kennzeichen -->
                <td class="p-4 text-sm text-gray-600"><?= $bus["register_plate"] ?></td>
                <!-- Sitzplätze -->
                <td class="p-4 text-sm text-gray-600"><?= $bus["seats"] ?></td>
                <!-- Verfügbarkeit -->
                <td class="p-4 text-sm text-gray-600">
                    <?php
                    $date = new DateTime($bus["availability"]);
                    echo $date->format('d-m-Y');
                    ?>
                </td>
                <!-- Actions -->
                <td class="p-4 text-sm text-gray-600 flex justify-center space-x-2">
                    <a href="/bus?id=<?= $bus["id"] ?>"
                       class="p-2 bg-emerald-50 text-xs text-emerald-900 hover:bg-emerald-500 hover:text-white transition rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-eye">
                            <circle cx="12" cy="12" r="2" fill="currentColor"></circle>
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                        </svg>
                    </a>
                    <?php if (isset($_SESSION["user"])) : ?>
                        <p class="hidden" id="user-role" data-user-id="<?= $_SESSION["user"]["role"] ?>"></p>
                        <?php if ($_SESSION["user"]["role"] === "admin") : ?>
                            <a href="/bus/edit?id=<?= $bus["id"] ?>"
                               class="p-2 bg-emerald-50 text-xs text-emerald-900 hover:bg-emerald-500 hover:text-white transition rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="#FFA500" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-edit">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                            </a>

                            <a href="/bus/delete?id=<?= $bus["id"] ?>"
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
                        <?php endif; ?>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>

<?php include __DIR__ . "/../partials/_footer.php" ?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.checkbox-group.buses-checkbox input[type="checkbox"]').forEach(checkbox => {
            checkbox.addEventListener('change', () => {
                const selectedFilters = getSelectedFilters();

                console.log(selectedFilters)

                const busId = document.getElementById('bus-table').getAttribute('data-bus-id');
                const userRole = document.getElementById('user-role').getAttribute('data-user-id');

                fetch('/filter', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json'},
                    body: JSON.stringify(
                        {
                            filters: selectedFilters,
                            busId: busId
                        }
                    )
                })
                    .then(response => response.json())
                    .then(data => {
                        displayBusOptions(data, userRole);
                    });
            });
        });
    });


    function getSelectedFilters() {
        const filters = {};
        document.querySelectorAll('.checkbox-group input[type="checkbox"]:checked').forEach(checkbox => {
            filters[checkbox.name] = checkbox.value;
        });
        return filters;
    }

    function displayBusOptions(data, userRole) {
        const tableBody = document.querySelector('table tbody');
        tableBody.innerHTML = '';

        data.forEach(bus => {
            const row = document.createElement('tr');
            row.setAttribute('data-bus-id', bus.id);

            const properties = ['register_plate', 'seats', 'availability'];
            properties.forEach(prop => {
                const cell = document.createElement('td');
                cell.className = 'p-4 text-sm text-gray-600';
                if (prop === 'availability') {
                    const date = new Date(bus[prop]);
                    cell.textContent = date.toLocaleDateString('de-DE', {
                        year: 'numeric',
                        month: '2-digit',
                        day: '2-digit'
                    });
                } else {
                    cell.textContent = bus[prop];
                }
                row.appendChild(cell);
            });

            const cellActions = document.createElement('td');
            cellActions.className = 'p-4 text-sm text-gray-600 flex justify-center space-x-2';

            const viewLink = createLink(`/bus?id=${bus.id}`, 'feather feather-eye', 'currentColor');
            cellActions.appendChild(viewLink);

            if (userRole === 'admin') {
                const editLink = createLink(`/bus/edit?id=${bus.id}`, 'feather feather-edit', '#FFA500');
                cellActions.appendChild(editLink);

                const deleteLink = createLink(`/bus/delete?id=${bus.id}`, 'feather feather-trash-2', '#FF0000');
                cellActions.appendChild(deleteLink);
            }

            row.appendChild(cellActions);
            tableBody.appendChild(row);
        });
    }

    function createLink(href, iconClass, strokeColor) {
        const link = document.createElement('a');
        link.href = href;
        link.className = 'p-2 bg-emerald-50 text-xs text-emerald-900 hover:bg-emerald-500 hover:text-white transition rounded';

        const svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
        svg.setAttribute('width', '24');
        svg.setAttribute('height', '24');
        svg.setAttribute('viewBox', '0 0 24 24');
        svg.setAttribute('fill', 'none');
        svg.setAttribute('stroke', strokeColor);
        svg.setAttribute('stroke-width', '2');
        svg.setAttribute('stroke-linecap', 'round');
        svg.setAttribute('stroke-linejoin', 'round');
        svg.classList.add(...iconClass.split(' '));

        if (iconClass.includes('eye')) {
            const circle = document.createElementNS('http://www.w3.org/2000/svg', 'circle');
            circle.setAttribute('cx', '12');
            circle.setAttribute('cy', '12');
            circle.setAttribute('r', '2');
            circle.setAttribute('fill', strokeColor); // Fill color for the inner circle
            svg.appendChild(circle);

            const path = document.createElementNS('http://www.w3.org/2000/svg', 'path');
            path.setAttribute('d', 'M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z');
            svg.appendChild(path);
        } else if (iconClass.includes('edit')) {
            const path1 = document.createElementNS('http://www.w3.org/2000/svg', 'path');
            path1.setAttribute('d', 'M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7');
            svg.appendChild(path1);

            const path2 = document.createElementNS('http://www.w3.org/2000/svg', 'path');
            path2.setAttribute('d', 'M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z');
            svg.appendChild(path2);
        } else if (iconClass.includes('trash-2')) {
            const polyline = document.createElementNS('http://www.w3.org/2000/svg', 'polyline');
            polyline.setAttribute('points', '3 6 5 6 21 6');
            svg.appendChild(polyline);

            const path = document.createElementNS('http://www.w3.org/2000/svg', 'path');
            path.setAttribute('d', 'M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2');
            svg.appendChild(path);

            const line1 = document.createElementNS('http://www.w3.org/2000/svg', 'line');
            line1.setAttribute('x1', '10');
            line1.setAttribute('y1', '11');
            line1.setAttribute('x2', '10');
            line1.setAttribute('y2', '17');
            svg.appendChild(line1);

            const line2 = document.createElementNS('http://www.w3.org/2000/svg', 'line');
            line2.setAttribute('x1', '14');
            line2.setAttribute('y1', '11');
            line2.setAttribute('x2', '14');
            line2.setAttribute('y2', '17');
            svg.appendChild(line2);
        }

        link.appendChild(svg);
        return link;
    }


</script>