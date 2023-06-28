<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="ceci est un super site">
    <title>Super site</title>
    <link rel="stylesheet" href="/styles.css">
    <script src="https://code.highcharts.com/highcharts.js"></script>
</head>
<body class="dashboard-body">
    <nav class="dashboard-nav">
        <ul>
            Accueil
            <li>Panel</li>
        </ul>

        <ul>
            Personnalisation
            <li>Menu du site</li>
            <li>Couleurs principales du site</li>
            <li>Typographies</li>
            <li></li>
        </ul>
    </nav>

    <main role="main">
        <!-- inclure la vue -->
        <?php include $this->view;?>
    </main>


</body>
</html>