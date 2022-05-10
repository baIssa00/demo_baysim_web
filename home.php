<?php
include_once 'identifier.php';
include_once 'dbConfig.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>Accueil</title>
</head>
<body>
    <div class="container">
        <div class="content">
            <h3><span>Bienvenue</span></h3>
            <h1>Bienvenue <span><?php echo $user; ?></span></h1>
            <p>Page Accueil</p>
            <a href="galerie/galerie.php" class="btn">Galerie</a>
            <a href="profile.php?idUser=<?php echo $_SESSION['user']['iduser'] ?>" class="btn">Profile</a>
            <a href="edit.php?idUser=<?php echo $_SESSION['user']['iduser'] ?>" class="btn">Modifier ses données personnelles</a>
            <a href="logout.php" class="btn">Déconnexion</a>
        </div>
    </div>
</body>
</html>