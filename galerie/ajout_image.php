<?php
    require_once('../identifier.php');
    require_once('../dbConfig.php');
    if (isset($_POST['addImage'])) {
        // var_dump($_FILES['image']);
        $images = [
            'title' => htmlspecialchars($_POST['title']),
            'image_name' => 'images/'.$_FILES['image']['name'],
            'image_file' => $_FILES['image']['tmp_name'],
            'image_size' => $_FILES['image']['size'],
            'image_error' => $_FILES['image']['error']
        ];
        // foreach($images as $image){
        //     echo '<br>' , $image, '<br>';
        // }

        // $max_size = 1000000;
        
        if ($images['image_error'] == 0) {
                //stockage de l'image au niveau du fichier "images"
            move_uploaded_file($images['image_file'], $images['image_name']);
            
            $addImage = $pdo->prepare("INSERT INTO image(title, link) VALUES (:title, :image_name)");
            $addImage->execute(array(
                'title' => $images['title'],
                'image_name' => $images['image_name']
            ));
            header('Location:galerie.php');
        }else{
            echo "Merci d'envoyer une image plus légère";
            header('Location:galerie.php');
        }
    }
    
?>