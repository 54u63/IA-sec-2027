<?php
session_start();
#require_once 'database.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f9; height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: center; }
        .container { max-width: 400px; width: 100%; background: white; padding: 2rem; border: 1px solid #ccc; border-radius: 10px; }
        form { display: flex; flex-direction: column; }
        label { margin-bottom: 0.5rem; }
        input { padding: 0.5rem; margin-bottom: 1rem; border: 1px solid #ccc; border-radius: 5px; }
        button { padding: 0.5rem; background: #007BFF; color: white; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background: #0056b3; }
        .back-link { display: block; margin-top: 1rem; text-align: center; }
        .back-link a { color: #007BFF; text-decoration: none; }
        .back-link a:hover { text-decoration: underline; }
    </style>
</head>
<body>
<div class="container">
    <h2>Connexion</h2>
    <form action="process_login.php" method="POST">
    <label for="username">Nom d'utilisateur :</label>
    <input type="text" id="username" name="username" required>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Se connecter</button>
    </form>
    <div class="back-link">
        <a href="index.php">Retour à l'accueil</a>
    </div>
</div>
</body>
</html>