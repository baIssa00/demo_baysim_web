<?php
require_once("../dbConfig.php");
?>

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
        <!-- Affichage des messages d'erreurs -->
        <span id="error" class="error-msg"></span>

        <!-- les champs d'inscriptions -->
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
    <script src="js/index.js"></script>

</body>

</html>