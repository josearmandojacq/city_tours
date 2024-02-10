<?php include "partials/_header.php" ?>

<!-- Start Main Content Area -->
<section class="container mx-auto mt-12 p-4 bg-white shadow-md border border-gray-200 rounded">
    <div class="flex items-center justify-between border-b border-gray-200 pb-4">
        <h4 class="font-medium">Angebote</h4>
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
            <th>Ansehen</th>
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
                        $date = new DateTime($tour["starting_date"]);
                        echo $date->format('d-m-Y');
                        ?>
                    </td>
                    <!-- Actions -->
                    <td class="p-4 text-sm text-gray-600 flex justify-center space-x-2">
                        <a href="/tour?id=<?= $tour["id"] ?>"
                           class="p-2 bg-emerald-50 text-xs text-emerald-900 hover:bg-emerald-500 hover:text-white transition rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-eye">
                                <circle cx="12" cy="12" r="2" fill="currentColor"></circle>
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            </svg>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <nav class="flex items-center justify-between border-t border-gray-200 px-4 sm:px-0 mt-6">
        <!-- Previous Page Link -->
        <div class="-mt-px flex w-0 flex-1">
            <a href="/"
               class="inline-flex items-center border-t-2 border-transparent pr-1 pt-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">
                <svg class="mr-3 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                          d="M18 10a.75.75 0 01-.75.75H4.66l2.1 1.95a.75.75 0 11-1.02 1.1l-3.5-3.25a.75.75 0 010-1.1l3.5-3.25a.75.75 0 111.02 1.1l-2.1 1.95h12.59A.75.75 0 0118 10z"
                          clip-rule="evenodd"/>
                </svg>
                Previous
            </a>
        </div>
        <!-- Pages Link -->
        <div class="hidden md:-mt-px md:flex">
            <a href="/" class="inline-flex items-center border-t-2 px-4 pt-4 text-sm font-medium">
                1
            </a>
            <!-- Current: "border-indigo-500 text-indigo-600", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->
        </div>
        <!-- Next Page Link -->
        <div class="-mt-px flex w-0 flex-1 justify-end">
            <a href="/"
               class="inline-flex items-center border-t-2 border-transparent pl-1 pt-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">
                Next
                <svg class="ml-3 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                          d="M2 10a.75.75 0 01.75-.75h12.59l-2.1-1.95a.75.75 0 111.02-1.1l3.5 3.25a.75.75 0 010 1.1l-3.5 3.25a.75.75 0 11-1.02-1.1l2.1-1.95H2.75A.75.75 0 012 10z"
                          clip-rule="evenodd"/>
                </svg>
            </a>
        </div>
    </nav>
</section>
<!-- End Main Content Area -->

<?php include __DIR__ . "/partials/_footer.php" ?>
