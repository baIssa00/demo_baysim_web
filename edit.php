<?php
    include_once 'identifier.php';
    include_once 'dbConfig.php';

    $id = isset($_GET['idUser']) ? $_GET['idUser'] : 0;

    $requete = "select * from users where iduser=$id";

    $resultat = $pdo->query($requete);
    $utilisateur = $resultat->fetch();

    $login = $utilisateur['login'];
    $email = $utilisateur['email'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Se connecter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="form-container">
        <form method="post" action="update.php" class="form">
            <h3>Modification</h3>
            <?php if (!empty($erreurLogin)) { ?>
                <div class="error-msg">
                    <?php echo $erreurLogin ?>
                </div>
            <?php } ?>
            <input type="hidden" name="iduser" class="form-control" value="<?php echo $id ?>" />
            <input type="text" name="login" required value="<?php echo $login ?>">
            <input type="email" name="email" required value="<?php echo $email ?>">
            <input type="password" name="password" required placeholder="Entrer le nouveau mot de passe">
            <input type="password" name="npassword" required placeholder="Confirmer le nouveau mot de passe">
            <input type="submit" name="submit" value="Modifier" class="form-btn">
        </form>
    </div>
</body>
</HTML>