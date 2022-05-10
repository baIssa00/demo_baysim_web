<?php
session_start();
if (isset($_SESSION['erreurLogin']))
    $erreurLogin = $_SESSION['erreurLogin'];
else {
    $erreurLogin = "";
}
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Se connecter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="form-container">
        <form method="post" action="seConnecter.php" class="form">
            <h3>Connexion</h3>
            <?php if (!empty($erreurLogin)) { ?>
                <div class="error-msg">
                    <?php echo $erreurLogin ?>
                </div>
            <?php } ?>

            <input type="text" name="login" required placeholder="Entrez votre nom d'utilisateur">
            <input type="password" name="password" required placeholder="Entrez votre mot de passe">
            <input type="submit" name="submit" value="Se coonecter" class="form-btn">
            <p>Vous n'avez pas de compte? <a href="signup.php">S'inscrire</a></p>
        </form>
    </div>
</body>

</HTML>