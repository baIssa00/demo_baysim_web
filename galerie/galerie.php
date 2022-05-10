<?php
    require_once('../identifier.php');
    require_once('../dbConfig.php');
    $getImages = $pdo->prepare("SELECT * FROM image");
    $getImages->execute();

    // Récupération de toutes les images dans un tableau
    $images = $getImages->fetchALL(PDO::FETCH_ASSOC);
    // var_dump($images);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>galerie</title>
</head>
<body>
    <div class="container">
    <?php include('menu.php');?>
        <div class="addImages">
            <h1>Ajouter une image </h1>
            <!-- utilisation de l'encodage multipart/form-data pour telecharger des images (type="file") -->
            <form action="ajout_image.php" method="post" enctype="multipart/form-data">
                <div class="input-container">
                    <label for="title">Nom de la photo</label>
                    <input type="text"  name="title" id="title" placeholder="Donnez le titre de l'image">
                </div>
                <div class="input-container">
                    <label for="image">Choisir la photo à ajouter</label>
                    <input type="file"  name="image" id="image" accept="image/png, image/jpg, image/jpeg, image/gif">
                </div>
                <button type="submit" name="addImage">Ajouter la photo</button>
            </form>
        </div>
        <h1>Ma galerie</h1>
        <div class="showImages">
            
                <?php foreach($images as $image){ ?>
                    <div class="galerie">
                        <div class="galerie__image">
                            <img src="<?php echo $image['link']; ?>" alt="<?php echo $image['title']; ?>">
                        </div>
                    </div>
                <?php } ?>
        </div>
    </div>

</body>
</html>