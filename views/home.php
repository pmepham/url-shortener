<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Peters URL shortener</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gray-100 text-gray-900">
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6">
            <h1 class="text-3xl font-bold">Peters URL shortener</h1>
        </div>
    </header>

    <main class="mx-auto max-w-4xl px-4 py-8">
        <section class="rounded-lg bg-white p-6 shadow">
            <h2 class="mb-4 text-xl font-semibold">Shorten your url:</h2>
            <form method="POST" action="">
                <div class="flex">
                    <input class="flex-1 border-2 <?php echo !empty($errors['url']) ? 'border-red-600' : 'border-blue-600'; ?> rounded-lg p-3" type="text" name="url">
                    <button class="ms-3 rounded-lg bg-blue-600 px-4 py-2 font-medium text-white hover:bg-blue-700">
                        Shorten
                    </button>
                </div>
                <?php echo !empty($errors['url']) ? '<p class="text-sm text-red-600 font-semibold">'.$errors['url'].'<p>' : '' ?>
            </form>
        </section>
    </main>

    <footer class="mt-8 border-t bg-white">
        <div class="mx-auto max-w-7xl px-4 py-4 text-sm text-gray-500">
            &copy; 2026 Your Name
        </div>
    </footer>
</body>

</html>