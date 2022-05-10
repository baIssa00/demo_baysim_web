<?php
session_start();
require_once('../dbConfig.php');

$login = isset($_POST['login']) ? $_POST['login'] : "";

$pwd = isset($_POST['password']) ? $_POST['password'] : "";

$requete = "SELECT * FROM users WHERE login=:login AND password=:password";

$resultat = $pdo->prepare($requete);
$resultat->execute(array('login'=>$login, 'password'=>MD5($pwd)));

if ($user = $resultat->fetch()) {

    if ($user['etat'] == 1) {
        
        if ($user['role'] == 'ADMIN') {
            $_SESSION['user'] = $user;
            header('location:dashboard.php');
        } else {
            $_SESSION['erreurLogin'] = "<p class='error-msg'><strong>Erreur!!</strong> Vous n'etes pas un administrateur.<br> Veuillez contacter l'administrateur</p>";
            header('location:login.php');
        }
        
    } else {

        $_SESSION['erreurLogin'] = "<p class='error-msg'><strong>Erreur!!</strong> Votre compte est désactivé.<br> Veuillez contacter l'administrateur</p>";
        header('location:login.php');
    }
} else {
    $_SESSION['erreurLogin'] = "<p class='error-msg'><strong>Erreur!</strong><br> Login ou mot de passe incorrecte !</p>";
    header('location:login.php');
}
