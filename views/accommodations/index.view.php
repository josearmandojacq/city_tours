<?php include __DIR__ . "/../partials/_header.php" ?>

<section class="container mx-auto mt-12 p-4 bg-white shadow-md border border-gray-200 rounded">
    <div class="flex items-center justify-between border-b border-gray-200 pb-4">
        <h4 class="text-2xl font-black">Unterkünfte</h4>
        <?php if (isset($_SESSION["user"]) && $_SESSION["user"]["role"] === "admin") : ?>
            <a href="/accommodation/create"
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

    <table class="table-auto min-w-full divide-y divide-gray-300 mt-6">
        <thead class="bg-gray-50">
        <tr>
            <th class="p-4 text-left text-sm font-semibold text-gray-900">
                Art
            </th>
            <th class="p-4 text-left text-sm font-semibold text-gray-900">
                Name
            </th>
            <th class="p-4 text-left text-sm font-semibold text-gray-900">
                Stadt
            </th>
            <th class="p-4 text-left text-sm font-semibold text-gray-900">
                Verfügbare Zimmer
            </th>
            <th>Aktionen</th>
        </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 bg-white">
        <?php foreach ($accommodations as $accommodation) : ?>
            <tr>
                <!-- Type -->
                <td class="p-4 text-sm text-gray-600"><?= ucfirst($accommodation["type"]) ?></td>
                <!-- Name -->
                <td class="p-4 text-sm text-gray-600"><?= $accommodation["name"] ?></td>
                <!-- Stadt -->
                <td class="p-4 text-sm text-gray-600"><?= $accommodation["city"] ?></td>
                <!-- Verfügbare Zimmer -->
                <td class="p-4 text-sm text-gray-600"><?= $accommodation["available_rooms"] ?></td>
                <!-- Actions -->
                <td class="p-4 text-sm text-gray-600 flex justify-center space-x-2">
                    <a href="/accommodation?id=<?= $accommodation["id"] ?>"
                       class="p-2 bg-emerald-50 text-xs text-emerald-900 hover:bg-emerald-500 hover:text-white transition rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-eye">
                            <circle cx="12" cy="12" r="2" fill="currentColor"></circle>
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                        </svg>
                    </a>
                    <?php if (isset($_SESSION["user"]) && $_SESSION["user"]["role"] === "admin") : ?>
                        <a href="/accommodation/edit?id=<?= $accommodation["id"] ?>"
                           class="p-2 bg-emerald-50 text-xs text-emerald-900 hover:bg-emerald-500 hover:text-white transition rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="#FFA500" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-edit">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                            </svg>
                        </a>

                        <a href="/accommodation/delete?id=<?= $accommodation["id"] ?>"
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
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>

<?php include __DIR__ . "/../partials/_footer.php" ?>
