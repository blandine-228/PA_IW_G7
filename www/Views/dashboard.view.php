<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../Views/dashboard.css">
</head>
<body>
    <header>
        <h1>ESGI Dashboard</h1>
    </header>
    <nav>
        <ul>
            <li><a href="#">Accueil</a></li>
            <li><a href="#">Utilisateurs</a></li>
            <li><a href="#">Statistiques</a></li>
            <li><a href="#">Paramètres</a></li>
        </ul>
    </nav>
    <section class="main-content">
        <div class="widget">
            <h2>Statistiques</h2>
            <div class="widget-content">
                <!-- Contenu du widget de statistiques -->
            </div>
        </div>
        <div class="widget">
            <h2>Utilisateurs</h2>
            <div class="widget-content">
            <?php foreach ($data as $row): ?>
            <p>Nom: <?php echo $row['lastname']; ?></p>
            <p>Prenom: <?php echo $row['firstname']; ?></p>
            <p>Email: <?php echo $row['email']; ?></p>
            <!-- Ajouter d'autres informations de la base de données à afficher -->
        <?php endforeach; ?>
            </div>
        </div>
        <!-- Ajouter d'autres widgets ici -->
    </section>
    <footer>
        <p>© 2023 ESGI Dashboard. Tous droits réservés.</p>
    </footer>
</body>
</html>
