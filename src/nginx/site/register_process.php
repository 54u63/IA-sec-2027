<?php
session_start();
include('database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT COUNT(*) FROM utilisateurs WHERE user = :username");
    $stmt->execute(['username' => $username]);
    $userExists = $stmt->fetchColumn();

    if ($userExists) {
        echo "Le nom d'utilisateur est déjà pris.";
    } else {
        $stmt = $pdo->prepare("INSERT INTO utilisateurs (user, password, is_admin) VALUES (:username, :password, 0)");
        $stmt->execute(['username' => $username, 'password' => $password]);

        echo "Inscription réussie ! Vous pouvez maintenant vous connecter.";
    }
    
    header("Location: index.php");
    exit();
} else {
    header("Location: index.php");
    exit();
}
?>
