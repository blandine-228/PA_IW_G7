<!DOCTYPE html>
<html lang="fr" class="">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="ceci est un super site">
    <title>Super site</title>
    <link rel="stylesheet" href="/styles.css">
    <script src="https://code.highcharts.com/highcharts.js"></script>
</head>
<body class="grid grid-cols-12 h-screen">
    <aside class="bg-white text-gray-200 flex flex-col py-8 px-6 col-span-3 ">
        <div class="py-1 px-6">
            <h1 class="text-sm uppercase font-semibold text-slate-700">Accueil</h1>
        </div>
        <nav class="px-6 py-1">
            <a href="#" class="block text-slate-700">Tableau de bord</a>
        </nav>

        <hr class="my-4 md:min-w-full">

        <div class="py-1 px-6">
            <h1 class="block py-2 uppercase text-sm font-semibold text-slate-700">Personnalisation</h1>
        </div>
        <nav class="py-1 px-6">
            <a href="#" class="block pb-3 text-slate-700">Menu du site</a>
            <a href="#" class="block pb-3 text-slate-700">Couleurs principales du site</a>
            <a href="#" class="block pb-3 text-slate-700">Typographies</a>
        </nav>
    </aside>

    <main role="main" class="flex justify-center items-center bg-white col-span-9">
        <!-- inclure la vue -->
        <?php include $this->view;?>
    </main>
</body>
</html>