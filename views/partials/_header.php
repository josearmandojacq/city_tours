<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Title</title>

    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;700&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="/assets/main.css"/>
    <link rel="stylesheet" href="/assets/main.css"/>
</head>

<body class="bg-indigo-50 font-['Outfit']">
<!-- Start Header -->
<header class="bg-indigo-900">
    <nav class="mx-auto flex container items-center justify-between py-4" aria-label="Global">
        <a href="/" class="-m-1.5 p-1.5 text-white text-2xl font-bold">City Tours</a>
        <!-- Navigation Links -->
        <div class="flex lg:gap-x-10">
            <a href="/about" class="text-gray-300 hover:text-white transition">Über</a>
            <div class="relative">
                <button id="dropdownButton" class="focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-6 h-6 text-gray-300 hover:text-white transition cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                    </svg>
                </button>
                <div id="dropdownMenu"
                     class="hidden absolute right-0 mt-2 bg-white divide-y divide-gray-100 rounded shadow-lg w-48">
                    <?php if (isset($_SESSION["user"])) : ?>
                        <?php if ($_SESSION["user"]["role"] === "admin") : ?>
                            <!-- Admin-specific links -->
                            <a href="/buses" class="block px-4 py-2 text-sm text-gray-700 hover:text-white transition">Busse</a>
                            <a href="/accommodations" class="block px-4 py-2 text-sm text-gray-700 hover:text-white transition">Unterkünfte</a>
                        <?php endif; ?>
                        <!-- Logout is available to all logged-in users, including admins -->
                        <a href="/logout" class="block px-4 py-2 text-sm text-gray-700 hover:text-white transition">Abmelden</a>
                    <?php else : ?>
                        <!-- Links available to non-logged-in users -->
                        <a href="/login" class="block px-4 py-2 text-sm text-gray-700 hover:text-white transition">Anmelden</a>
                        <a href="/register" class="block px-4 py-2 text-sm text-gray-700 hover:text-white transition">Registrieren</a>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </nav>
</header>
<!-- End Header -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropdownButton = document.getElementById('dropdownButton');
        const dropdownMenu = document.getElementById('dropdownMenu');

        dropdownButton.addEventListener('click', function() {
            dropdownMenu.classList.toggle('hidden');
        });

        window.addEventListener('click', function(e) {
            if (!dropdownButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    });
</script>
