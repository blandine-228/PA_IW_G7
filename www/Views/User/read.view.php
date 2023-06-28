<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>
<body>
    <h1>All Users</h1>
    <table>
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <!-- Ajoutez des colonnes supplémentaires pour d'autres attributs utilisateur -->
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user->getFirstname(); ?></td>
                <td><?= $user->getLastname(); ?></td>
                <td><?= $user->getEmail(); ?></td>
                <!-- Ajoutez des cellules supplémentaires pour d'autres attributs utilisateur -->
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
