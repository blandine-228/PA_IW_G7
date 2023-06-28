<!DOCTYPE html>
<html>
<head>
    <title>Tableau de bord</title>
    <!-- Ajoutez ici les balises meta, les liens CSS et les scripts JavaScript nécessaires -->
</head>
<body>
    <h1>Tableau de bord</h1>

    <table>
    <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
        </tr>
    </thead>
    <tbody>
        <?php if (isset($data)): ?>
            <?php foreach ($data as $row): ?>
                <tr>
                    <td><?php echo $row['firstname']; ?></td>
                    <td><?php echo $row['lastname']; ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
  

    <a href="/logout">Déconnexion</a> <!-- Lien de déconnexion -->

    <!-- Ajoutez ici les scripts JavaScript supplémentaires si nécessaire -->
</body>
</html>
