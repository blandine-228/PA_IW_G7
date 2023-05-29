<!DOCTYPE html>
<html>
<head>
    <title>Page de connexion</title>
</head>
<body>
    <h2>Page de connexion:</h2>
    <form method="POST" action="/login">
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" name="username" id="username" required><br><br>

        <label for="password">Mot de passe:</label>
        <input type="password" name="password" id="password" required><br><br>

        <input type="submit" value="Se connecter">
    </form>
</body>
</html>