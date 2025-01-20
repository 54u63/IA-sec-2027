<?php
session_start(); 

include('database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE user = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();

    if ($user) {
        if ($user['password'] === $password) {
            $_SESSION['user'] = $user['user']; 
            $_SESSION['is_admin'] = $user['is_admin']; 
            header("Location: index.php");
            exit();
        } else {
            echo "Mot de passe incorrect.";
        }
    } else {
        echo "L'utilisateur n'existe pas.";
    }
} else {
    header("Location: index.php");
    exit();
}
?>
