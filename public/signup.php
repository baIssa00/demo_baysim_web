<?php

require_once("../dbConfig.php");
require_once("../functions.php");

$validationErrors = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $login = $_POST['login'];
    $pwd1 = $_POST['pwd1'];
    $pwd2 = $_POST['pwd2'];
    $email = $_POST['email'];

    $image = $_FILES['image']['name'];
    $image_folder = '../images/'.$image;
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_size = $_FILES['image']['size'];

    if (isset($login)) {
        $filtredLogin = filter_var($login, FILTER_SANITIZE_STRING);

        if (strlen($filtredLogin) < 4) {
            $validationErrors[] = "Erreur!!! Le login doit contenir au moins 4 caratères";
        }
    }

    if (isset($pwd1) && isset($pwd2)) {

        if (empty($pwd1)) {
            $validationErrors[] = "Erreur!!! Le mot ne doit pas etre vide";
        }

        if (md5($pwd1) !== md5($pwd2)) {
            $validationErrors[] = "Erreur!!! les deux mot de passe ne sont pas identiques";
        }
    }

    if (isset($email)) {
        $filtredEmail = filter_var($email, FILTER_SANITIZE_EMAIL);

        if ($filtredEmail != true) {
            $validationErrors[] = "Erreur!!! Email  non valid";
        }
    }
    if ($_FILES['image']['error'] != 0){
        $validationErrors[] = "Merci d'envoyer une image plus légère";
    }

    if (empty($validationErrors)) {
        if (search_login($login) == 0 & search_email($email) == 0) {
            move_uploaded_file($image_tmp_name, $image_folder);

            $requete = $pdo->prepare("INSERT INTO users(login,email,password,role,etat,image) 
                                        VALUES(:login,:email,:password,:role,:etat,:image)");

            $requete->execute(array(
                'login' => $login,
                'email' => $email,
                'password' => md5($pwd1),
                'role' => 'VISITEUR',
                'etat' => 0,
                'image' => $image_folder
            ));

            $success_msg = "Félicitation, votre compte est crée, mais temporairement inactif jusqu'a activation par l'admin";
        } else {
            if (search_login($login) > 0) {
                $validationErrors[] = 'Désolé le login exsite deja';
            }
            if (search_email($email) > 0) {
                $validationErrors[] = 'Désolé cet email exsite deja';
            }
        }
    }
}

?>

<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title> Nouvel utilisateur </title>
    <!-- <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">

</head>

<body>
<!-- <div class="form-container">

<form action="" method="post" enctype="multipart/form-data">
   <h3>Inscription</h3>
   <input type="text" name="login" required placeholder="Entrez votre nom d'utilisateur" minlength=4>
   <input type="email" name="email" required placeholder="Entrez votre email"
            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.com$">
   <input type="password" name="pwd1" minlength="8" required placeholder="Entrez votre mot de passe">
   <input type="password" name="pwd2" required placeholder="confirmez votre mot de passe">
   <input type="file" name="image" id="image" accept="image/png, image/jpg, image/jpeg, image/gif">

   <input type="submit" name="submit" value="S'inscrire" class="form-btn">
   <p>Vous avez deja un compte? <a href="login.php">Se connecter</a></p>
</form>

</div> -->
    <input type="checkbox" id="switch">

    <div class="controls">
        <label for="switch"></label>
    </div>

    <div class="logo-image">
        <img src="logo.png" alt="">
    </div>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data" class="form">
            <h3>Inscription</h3>

            <?php
                if (isset($validationErrors) && !empty($validationErrors)) {
                    foreach ($validationErrors as $error) {
                        echo '<div class="error-msg">' . $error . '</div>';
                    }
                }
                if (isset($success_msg) && !empty($success_msg)) {
                    echo '<div class="error-msg">' . $success_msg . '</div>';

                    header('refresh:5;url=login.php');
                }
            ?>

            <i class="fas fa-user"><input type="text" name="login" required placeholder="Nom d'utilisateur" minlength=4 class="box"></i>
            <i class="fa-solid fa-envelope"><input type="email" name="email" required placeholder="Email"
            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.com$" class="box"></i>
            <i class="fas fa-lock"><input type="password" name="pwd1" minlength="8" required placeholder="Mot de passe" class="box"></i>
            <i class="fas fa-lock"><input type="password" name="pwd2" required placeholder="Confirmation" class="box"></i>
            <i class="fa-solid fa-image-portrait"><input type="file" name="image" id="image" accept="image/png, image/jpg, image/jpeg, image/gif" class="box">
            <input type="submit" name="submit" value="S'inscrire" class="btn">
            <p> Vous avez dejà un compte?<a href="login.php">Se Connecter</a></p>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>