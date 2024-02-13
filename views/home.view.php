<?php include "partials/_header.php" ?>

<!-- Start Main Content Area -->
<section class="container mx-auto mt-12 p-4 bg-white shadow-md border border-gray-200 rounded">
    <div class="flex items-center justify-between border-b border-gray-200 pb-4">
        <h4 class="text-2xl font-black">Tours</h4>
        <?php if ($_SESSION["user"] ?? false) : ?>
            <?php if ($_SESSION["user"]["role"] === "admin") : ?>
                <a href="/tour/create"
                   class="block w-10 py-2 bg-indigo-600 text-white rounded flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-plus">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                </a>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <!-- Search Form -->
    <form method="GET" class="mt-4 w-full">
        <div class="flex">
            <input name="s" type="text"
                   class="w-full rounded-l-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                   placeholder="Suchbegriff eingeben"/>
            <button type="submit"
                    class="rounded-r-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Suchen
            </button>
        </div>
    </form>
    <!-- Transaction List -->
    <table class="table-auto min-w-full divide-y divide-gray-300 mt-6">
        <thead class="bg-gray-50">
        <tr>
            <th class="p-4 text-left text-sm font-semibold text-gray-900">
                Ziel
            </th>
            <th class="p-4 text-left text-sm font-semibold text-gray-900">
                Start
            </th>
            <th class="p-4 text-left text-sm font-semibold text-gray-900">
                Datum
            </th>
            <th>Aktionen</th>
        </tr>
        </thead>
        <!-- Transaction Table Body -->
        <tbody class="divide-y divide-gray-200 bg-white">
        <?php foreach ($tours as $tour) : ?>
            <tr>
                <!-- Ziel -->
                <td class="p-4 text-sm text-gray-600"><?= $tour["end_city"] ?></td>
                <!-- Start -->
                <td class="p-4 text-sm text-gray-600"><?= $tour["start_city"] ?></td>
                <!-- Datum -->
                <td class="p-4 text-sm text-gray-600">
                    <?php
                    $date = new DateTime($tour["date"]);
                    echo $date->format('d-m-Y');
                    ?>
                </td>
                <!-- Actions -->
                <td class="p-4 text-sm text-gray-600 flex justify-center space-x-2">
                    <a href="/tour?id=<?= $tour["id"] ?>"
                       class="p-2 bg-amber-50 text-xs text-amber-900 hover:bg-amber-500 hover:text-white transition rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-eye">
                            <circle cx="12" cy="12" r="2" fill="currentColor"></circle>
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                        </svg>
                    </a>
                    <?php if (isset($_SESSION["user"]) && $_SESSION["user"]["role"] != "admin") : ?>
                        <!-- Booking -->
                        <a href="/book?id=<?= $tour["id"] ?>"
                           class="p-2 bg-emerald-50 text-xs text-emerald-900 hover:bg-emerald-500 hover:text-white transition rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-calendar-check">
                                <!-- Calendar shape -->
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                                <!-- Check mark -->
                                <polyline points="10 14 14 18 20 12"></polyline>
                            </svg>
                        </a>
                    <?php endif; ?>

                    <?php if ($_SESSION["user"] ?? false) : ?>
                        <?php if ($_SESSION["user"]["role"] === "admin") : ?>
                            <a href="/tour/edit?id=<?= $tour["id"] ?>"
                               class="p-2 bg-emerald-50 text-xs text-emerald-900 hover:bg-emerald-500 hover:text-white transition rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="#FFA500" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-edit">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                            </a>

                            <a href="/tour/delete?id=<?= $tour["id"] ?>"
                               class="p-2 bg-emerald-50 text-xs text-emerald-900 hover:bg-emerald-500 hover:text-white transition rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="#FF0000" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-trash-2">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
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
<!-- End Main Content Area -->

<?php include __DIR__ . "/partials/_footer.php" ?>
