<!-- <?php

// require_once("../dbConfig.php");
// require_once("../functions.php");

// $validationErrors = array();

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $data = [];
//     $login = $_POST['login'];
//     $pwd1 = $_POST['pwd1'];
//     $pwd2 = $_POST['pwd2'];
//     $email = $_POST['email'];


//     if (isset($login)) {
//         $filtredLogin = filter_var($login, FILTER_SANITIZE_STRING);

//         if (strlen($filtredLogin) < 4) {
//             $validationErrors[] = "Erreur!!! Le login doit contenir au moins 4 caratères";
//             $data['success'] = false;
//         }
//     }

//     if (isset($pwd1) && isset($pwd2)) {

//         if (empty($pwd1)) {
//             $validationErrors[] = "Erreur!!! Le mot ne doit pas etre vide";
//             $data['success'] = false;
//         }

//         if (md5($pwd1) !== md5($pwd2)) {
//             $validationErrors[] = "Erreur!!! les deux mot de passe ne sont pas identiques";
//         }
//     }

//     if (isset($email)) {
//         $filtredEmail = filter_var($login, FILTER_SANITIZE_EMAIL);

//         if ($filtredEmail != true) {
//             $validationErrors[] = "Erreur!!! Email  non valid";
//             $data['success'] = false;
//         }
//     }

//     if (empty($validationErrors)) {
//         if (search_login($login) == 0 & search_email($email) == 0) {
//             $requete = $pdo->prepare("INSERT INTO users(login,email,password,role,etat) 
//                                         VALUES(:login,:email,:password,:role,:etat)");

//             $requete->execute(array(
//                 'login' => $login,
//                 'email' => $email,
//                 'password' => md5($pwd1),
//                 'role' => 'VISITEUR',
//                 'etat' => 0
//             ));

//             $success_msg = "Félicitation, votre compte est crée, mais temporairement inactif jusqu'a activation par l'admin";
//             $data['success'] = true;
//         } else {
//             if (search_login($login) > 0) {
//                 $validationErrors[] = 'Désolé le login exsite deja';
//                 $data['success'] = false;
//             }
//             if (search_email($email) > 0) {
//                 $validationErrors[] = 'Désolé cet email exsite deja';
//                 $data['success'] = false;
//             }
//         }
//     }
// }

?> -->

<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8" />

    <title> Nouvel utilisateur </title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

</head>

<body>
<div class="form-container">
    <form action="" method="post">
    <h3>Inscription</h3>
    <?php
            // if (isset($validationErrors) && !empty($validationErrors)) {
            //     foreach ($validationErrors as $error) {
            //         echo '<div class="error-msg">' . $error . '</div>';
            //     }
            // }
            // if (isset($success_msg) && !empty($success_msg)) {
            //     echo '<div class="error-msg">' . $success_msg . '</div>';

            //     header('refresh:5;url=login.php');
            // }
            ?>
        <span id="error" class="error-msg"></span>
        <input type="text" id="login" name="login" required placeholder="Entrez votre nom d'utilisateur">
        <input type="email" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.com$" required placeholder="Entrez votre email">
        <input type="password" id="pwd1" name="pwd1" minlength="8" required placeholder="Entrez votre mot de passe">
        <input type="password" id="pwd2" name="pwd2" required placeholder="confirmez votre mot de passe">
        <input type="submit" name="submit" value="S'inscrire" class="form-btn" id="btn-inscrits">
        <p>Vous avez deja un compte? <a href="login.php">Se connecter</a></p>
    </form>
    </div>

    <!-- Links bootstrap Jquery and script signup -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/signup.js"></script>

</body>

</html>