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
    <title>Accueil | Mon Site Web</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f9; height: 100vh; display: flex; flex-direction: column; }
        header, footer { background: #333; color: white; padding: 1rem; text-align: center; }
        nav { background: #333; color: white; text-align: center; padding: 1rem; }
        nav a { color: white; text-decoration: none; margin: 0 1rem; }
        nav a:hover { text-decoration: underline; }
        main { flex: 1; padding: 2rem; display: flex; justify-content: center; align-items: center; text-align: center; }
        .content { padding-right: 2rem; }
        .card { max-width: 300px; background: white; padding: 1rem; border: 1px solid #ccc; border-radius: 10px; text-align: center; }
        .card img { width: 100px; height: 100px; border-radius: 50%; margin-bottom: 1rem; }
        .card h2 { margin: 0.5rem 0; }
        .card p { margin: 0.5rem 0; color: #555; }
        .auth-forms { text-align: right; margin: 1rem; }
        .auth-forms a { margin: 0 0.5rem; color: #007BFF; text-decoration: none; }
        .auth-forms a:hover { text-decoration: underline; }
        .user-message {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
    </style>
</head>
<body>
<header>
    <h1>Bienvenue sur TP IA IDS</h1>
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
    <?php if ($username): ?>
        <div class="user-message">
            <h2>Bonjour, <?php echo htmlspecialchars($username); ?>!</h2>
            <p>Vous êtes connecté.</p>
        </div>
    <?php else: ?>
        <div class="user-message">
            <h2>Bienvenue sur notre site !</h2>
            <p>Veuillez vous connecter pour accéder à plus de fonctionnalités.</p>
        </div>
    <?php endif; ?>
</main>

<footer>
    <p>&copy; <?php echo date('Y'); ?> Mon Site Web. Tous droits réservés.</p>
</footer>
</body>
</html>
