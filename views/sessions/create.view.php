<?php include __DIR__ . "/../partials/_header.php" ?>

<section class="max-w-2xl mx-auto mt-12 p-4 bg-white shadow-md border border-gray-200 rounded">
    <form method="POST" action="/login" class="grid grid-cols-1 gap-6">
        <label class="block">
            <span class="text-gray-700">Email address</span>
            <input value="<?= $_SESSION['_flash']['old']['email'] ?? '' ?>" name="email" type="email" autocomplete="email" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                   placeholder="john@example.com"/>
            <div class="bg-gray-100 text-red-500">
                <?php if (isset($errors["email"])) : ?>
                    <p><?= $errors["email"] ?></p>
                <?php endif; ?>
            </div>

        </label>
        <label class="block">
            <span class="text-gray-700">Password</span>
            <input name="password" type="password"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                   placeholder=""/>
            <div class="bg-gray-100 text-red-500">
                <?php if (isset($errors["password"])) : ?>
                    <p><?= $errors["password"] ?></p>
                <?php endif; ?>
            </div>

        </label>
        <div class="bg-gray-100 text-red-500">
            <?php if (isset($errors["general"])) : ?>
                <p><?= $errors["general"] ?></p>
            <?php endif; ?>
        </div>
        <button type="submit" class="block w-full py-2 bg-indigo-600 text-white rounded">
            Submit
        </button>
    </form>
</section>

<?php include __DIR__ . "/../partials/_footer.php" ?>
