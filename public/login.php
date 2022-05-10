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
    <!-- <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- <div class="form-container">
        <form method="post" action="../seConnecter.php" class="form" id='utilisateur'>
            <h3>Connexion</h3>

            <input type="text" name="login" required placeholder="Entrez votre nom d'utilisateur">
            <input type="password" name="password" required placeholder="Entrez votre mot de passe">
            <input type="submit" name="submit" value="Se coonecter" class="form-btn">
            <p>Vous n'avez pas de compte? <a href="signup.php">S'inscrire</a></p>
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
        <form method="post" action="../login_reg.php" class="form">
            <h3>Connexion</h3>
            <?php if (!empty($erreurLogin)) { ?>
                <div class="error-msg">
                    <?php echo $erreurLogin ?>
                </div>
            <?php } ?>
            <i class="fas fa-user"><input type="text" name="login" required placeholder="Nom d'utilisateur" class="box"></i>
            <i class="fas fa-lock"><input type="password" name="password" required placeholder="Mot de passe" class="box"></i>
            <div class="form-a">
                <a href="#">Mot de passe oublié</a>
            </div>
            
            <input type="submit" name="submit" value="Se coonecter" class="btn">
            <p>Vous n'avez pas de compte? <a href="signup.php">S'inscrire</a></p>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script src="public.js"></script> -->
</body>

</HTML>