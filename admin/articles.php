<?php
require_once('identifier.php');
require_once('../dbConfig.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css"> 

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
   
    <title>Articles</title>
</head>
<body>
    <div class="container">
        <?php require 'menu.php';?>
        <h2>MES ARTICLES</h2>
        <form class="formulaire" method="POST" action="">
            <div class="return"></div>
            <input type="text" name="title" required placeholder="Titre de l'article">
            <input type="text" name="description" required placeholder="La description de l'article">
            <input type="submit" name="submit" value="Envoyer..." class="form-btn">
        </form>
        <div class="afficher"></div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
    <script type="text/javascript">
    $(function() {
        $('#post').click(function() {
            alert("title"); 
        });
    });
</script>

</body>
</html>