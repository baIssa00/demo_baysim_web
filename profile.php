<?php
include_once 'identifier.php';
include_once 'dbConfig.php';
$id = isset($_GET['idUser']) ? $_GET['idUser'] : 0;

$requete = "select * from users where iduser=$id";

$resultat = $pdo->query($requete);
$utilisateur = $resultat->fetch();
$image = $utilisateur['image'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>Mon profile</title>
</head>
<body>
    <div class="container">
        <div class="galerie">
            <div class="galerie__image">
                <img src="<?php echo $image; ?>" alt="">
            </div>
        </div>
        <a href="logout.php" class="btn">Déconnexion</a>
        </div>
    </div>
</body>
</html>