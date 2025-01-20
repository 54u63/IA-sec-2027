<?php
session_start(); 

if (isset($_SESSION['user'])) {
    $username = $_SESSION['user']; 
} else {
    $username = null; 
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact | Mon Site Web</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f9; height: 100vh; display: flex; flex-direction: column; }
        header, footer { background: #333; color: white; padding: 1rem; text-align: center; }
        nav { background: #333; color: white; text-align: center; padding: 1rem; }
        nav a { color: white; text-decoration: none; margin: 0 1rem; }
        nav a:hover { text-decoration: underline; }
        main { flex: 1; padding: 2rem; }
        form { max-width: 500px; margin: 0 auto; padding: 1rem; background: white; border: 1px solid #ccc; }
        label { display: block; margin-bottom: 0.5rem; }
        input, textarea, button { width: 100%; padding: 0.5rem; margin-bottom: 1rem; }
        button { background: #007BFF; color: white; border: none; cursor: pointer; }
        .auth-forms { text-align: right; margin: 1rem; }
        .auth-forms a { margin: 0 0.5rem; color: #007BFF; text-decoration: none; }
        .auth-forms a:hover { text-decoration: underline; }
    </style>
</head>
<body>
<header>
    <h1>Contactez-nous</h1>
</header>
<nav>
    <a href="index.php">Accueil</a>
    <a href="about.php">À propos</a>
    <a href="services.php">Services</a>
    <a href="contact.php">Contact</a>
</nav>

<div class="auth-forms">
    <?php if ($username): ?>
        <span>Bienvenue, <?php echo htmlspecialchars($username); ?>!</span>
        <a href="logout.php">Se déconnecter</a>
    <?php else: ?>
        <a href="login.php">Connexion</a>
        <a href="register.php">Inscription</a>
    <?php endif; ?>
</div>

<main>
    <h2>Nous sommes là pour vous aider</h2>
    <form action="#" method="POST">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>

        <label for="email">E-mail :</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Message :</label>
        <textarea id="message" name="message" rows="5" required></textarea>

        <button type="submit">Envoyer</button>
    </form>
</main>

<footer>
    <p>&copy; <?php echo date('Y'); ?> Mon Site Web. Tous droits réservés.</p>
</footer>
</body>
</html>
