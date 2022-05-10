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
    <title>Recherche Utilisateur</title>
</head>
<body>
    <div class="container">
        <?php include('menu.php');?>
        <div class="sc-container" style="max-width: 50%">
            <div class="text-center mt-5 mb-4">
                <h2>Rechercher un utilisataur</h2>
            </div>
            <input type="text" class="form-control" id="search_user" autocomplete="off" placeholder="Rechercher ...">
        </div>

        <div id="searchresult">

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="js/search.js"></script>
</body>
</html>