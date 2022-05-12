<?php

require_once("../dbConfig.php");
require_once("../functions.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [];
    $login = $_POST['login'];
    $pwd1 = $_POST['pwd1'];
    $pwd2 = $_POST['pwd2'];
    $email = $_POST['email'];


    if (isset($login)) {
        $filtredLogin = filter_var($login, FILTER_SANITIZE_STRING);

        if (strlen($filtredLogin) < 4) {
            echo "Erreur!!! Le login doit contenir au moins 4 caratères<br>";
            $data['success'] = false;
            exit();
        }
    }

    if (isset($pwd1) && isset($pwd2)) {

        if (empty($pwd1)) {
            echo "Erreur!!! Le mot ne doit pas etre vide<br>";
            $data['success'] = false;
            exit();
        }

        if (md5($pwd1) !== md5($pwd2)) {
            echo "Erreur!!! les deux mot de passe ne sont pas identiques<br>";
            $data['success'] = false;
            exit();
        }
    }

    if (isset($email)) {
        $filtredEmail = filter_var($login, FILTER_SANITIZE_EMAIL);

        if ($filtredEmail != true) {
            echo "Erreur!!! Email  non valid<br>";
            $data['success'] = false;
            exit();
        }
    }

    if (empty($validationErrors)) {
        if (search_login($login) == 0 & search_email($email) == 0) {
            $requete = $pdo->prepare("INSERT INTO users(login,email,password,role,etat) 
                                        VALUES(:login,:email,:password,:role,:etat)");

            $requete->execute(array(
                'login' => $login,
                'email' => $email,
                'password' => md5($pwd1),
                'role' => 'VISITEUR',
                'etat' => 0
            ));
            $data['success'] = true;
            echo "Félicitation, votre compte est crée, mais temporairement inactif jusqu'a activation par l'admin";
            // echo "<script> location.href='login.php'; </script>";
            echo "<meta http-equiv='refresh' content='5;url=login.php' />";
        } else {
            if (search_login($login) > 0) {
                $data['success'] = false;
                echo 'Désolé le login exsite deja<br>';
                exit();
            }
            if (search_email($email) > 0) {
                $data['success'] = false;
                echo 'Désolé cet email exsite deja';
                exit();
            }
        }
    }
}
json_encode($data);
?>