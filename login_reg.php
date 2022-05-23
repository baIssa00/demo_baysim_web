<?php
session_start();
require_once('dbConfig.php');

$login = isset($_POST['login']) ? $_POST['login'] : "";

$pwd = isset($_POST['password']) ? $_POST['password'] : "";

$requete = "SELECT * FROM users WHERE login=:login AND password=:password";

$resultat = $pdo->prepare($requete);
$resultat->execute(array('login'=>$login, 'password'=>MD5($pwd)));

if ($user = $resultat->fetch()) {

    if ($user['etat'] == 1) {

        $_SESSION['user'] = $user;
        header('location:home.php');
    } else {

        $_SESSION['erreurLogin'] = "<p class='error-msg'><strong>Erreur!!</strong> Votre compte est désactivé. Veuillez contacter l'administrateur</p>";
        header('location:public/login.php');
    }
} else {
    $_SESSION['erreurLogin'] = "<p class='error-msg'><strong>Erreur!</strong>Login ou mot de passe incorrecte !</p>";
    header('location:public/login.php');
}
