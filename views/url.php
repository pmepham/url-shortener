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
        <section class="rounded-lg bg-white p-6 shadow text-center">
            <a id="shortUrl" class="text-5xl text-blue-600 hover:text-blue-700"
                href="<?php echo $data['url'] ?>"><?php echo BASE_URL.'/'. $data['code'] ?></a>
            <p>Going to: <?php echo $data['url'] ?></p>
            <button id="copy_link"
                class="ms-3 rounded-lg bg-blue-600 px-4 py-2 font-medium text-white hover:bg-blue-700"
                onclick="copyLink()">
                Copy Link
            </button>
        </section>
    </main>

    <footer class="mt-8 border-t bg-white">
        <div class="mx-auto max-w-7xl px-4 py-4 text-sm text-gray-500">
            &copy; 2026 Your Name
        </div>
    </footer>

    <script>
        async function copyLink() {
            const link = document.getElementById('shortUrl').href;
            //navigator.clipboard only works with https
            if (navigator.clipboard && window.isSecureContext) {
                await navigator.clipboard.writeText(link);
                alert('Link copied!');
                return;
            }

            const textarea = document.createElement('textarea');
            textarea.value = link;
            textarea.style.position = 'fixed';
            textarea.style.left = '-9999px';

            document.body.appendChild(textarea);
            textarea.focus();
            textarea.select();

            document.execCommand('copy');
            document.body.removeChild(textarea);

            alert('Link copied!');
        }
    </script>

</body>

</html>