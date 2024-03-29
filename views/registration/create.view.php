<?php include __DIR__ . "/../partials/_header.php" ?>

<section class="max-w-2xl mx-auto mt-12 p-4 bg-white shadow-md border border-gray-200 rounded">
    <form action="/register" method="POST" class="grid grid-cols-1 gap-6">
        <!-- Email -->
        <label class="block">
            <span class="text-gray-700">Email address</span>
            <input name="email" type="email"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                   placeholder="john@example.com"/>
            <div class="bg-gray-100 text-red-500">
                <?php if (isset($errors["email"])) : ?>
                    <p><?= $errors["email"] ?></p>
                <?php endif; ?>
            </div>
        </label>
        <!-- Password -->
        <label class="block">
            <span class="text-gray-700">Password</span>
            <input name="password" type="password"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                   placeholder=""/>
        </label>
        <!-- Confirm Password -->
        <label class="block">
            <span class="text-gray-700">Confirm Password</span>
            <input name="confirmPassword" type="password"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                   placeholder=""/>
            <div class="bg-gray-100 text-red-500">
                <?php if (isset($errors["confirmPassword"])) : ?>
                    <p><?= $errors["confirmPassword"] ?></p>
                <?php endif; ?>
            </div>
        </label>
        <button type="submit" class="block w-full py-2 bg-indigo-600 text-white rounded">
            Submit
        </button>
    </form>
</section>

<?php include __DIR__ . "/../partials/_footer.php" ?>
