<?php
require_once('identifier.php');
require_once('../dbConfig.php');

$id = isset($_GET['idUser']) ? $_GET['idUser'] : 0;

$requete = "select * from users where iduser=$id";

$resultat = $pdo->query($requete);
$utilisateur = $resultat->fetch();

$login = $utilisateur['login'];
$email = $utilisateur['email'];
$role = $utilisateur['role'];
$profile = $utilisateur['image'];

?>
<!DOCTYPE HTML>
<HTML>

<head>
    <meta charset="utf-8">
    <title>Edition d'un utilisateur</title>
    <link rel="stylesheet" href="css/mystyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css"> 
 </head>

<body>
<?php include('menu.php');?>    
<div class="container">
        <div class="edit-container">
            <form method="POST" action="updateUser.php" class="form" id="edit" enctype="multipart/form-data">
                <!-- <h3>Profile</h3> -->
                <?php if (!empty($erreurLogin)) { ?>
                    <div class="error-msg">
                        <?php echo $erreurLogin ?>
                    </div>
                <?php } ?>
                <input type="hidden" name="iduser" class="form-control" value="<?php echo $id ?>" />

                <!-- profile image -->
                <?php if ($profile != "") { ?>                    
                    <img src="../images/<?php echo $profile?>" width="100px" height="100px" class="rounded-circle">
                <?php } else { ?>
                    <img src="img/user.png" width="100px" height="100px" class="rounded-circle">
                <?php } ?>    
                
                <input type="text" name="login" required value="<?php echo $login ?>">
                <input type="email" name="email" required value="<?php echo $email ?>">
                <select name="role" id="role">
                    <option value="ADMIN">ADMIN</option>
                    <option value="VISITEUR">VISITEUR</option>
                </select>
                <div class="form-group">
                            <input type="file" name="image" accept="image/png, image/jpg, image/jpeg, image/gif" />
                        </div>
                <input type="submit" name="submit" value="Modifier" class="form-btn">
            </form>
        </div>
    </div>
    
    
</body>
</HTML>