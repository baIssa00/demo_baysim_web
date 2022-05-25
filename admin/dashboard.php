<?php
    require_once('identifier.php');
    require_once('../dbConfig.php');
    $login = isset($_GET['login']) ? $_GET['login'] : "";

    $niveau=isset($_GET['niveau'])?$_GET['niveau']:"all";
    
    $size=isset($_GET['size'])?$_GET['size']:8;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;
    
    if($niveau=="all"){
        $requete="select * from users 
                where login like '%$login%'
                limit $size
                offset $offset";
        
        $requeteCount="select count(*) countUser from users
                where login like '%$login%'";
    }else{
         $requete="select * from users 
                where login like '%$login%'
                and niveau='$niveau'
                limit $size
                offset $offset";
        
        $requeteCount="select count(*) countUser from users
                where login like '%$login%'
                and niveau='$niveau'";
    }

    $resultatUser=$pdo->query($requete);

    $resultatCount = $pdo->query($requeteCount);

    $tabCount = $resultatCount->fetch();
    $nbrUser = $tabCount['countUser'];
    $reste = $nbrUser % $size;
    if ($reste === 0)
        $nbrPage = $nbrUser / $size;
    else
    $nbrPage = floor($nbrUser / $size) + 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/mystyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css"> 

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <title>Dashboard</title>
</head>
<body>
<?php include('menu.php');?> 
    <div class="container"> 
        <!-- Search User -->
        <!-- <div class="panel panel-success margetop60">
			<div class="panel-heading">Rechercher des utilisateurs</div>
				<div class="panel-body">
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" id="search_user" aria-label="Search" placeholder="Rechercher ...">
                </form>
            </div>
            
            <label for="role">Role:</label>
            <select name="role" class="form-control" id="role" onchange="this.form.submit()">
                <option value="ADMIN" <?php if($role==="ADMIN") echo "selected" ?>>ADMIN</option>
                <option value="VISITEUR"   <?php if($role==="VISITEUR")   echo "selected" ?>>VISITEUR</option>
            </select>
		</div> -->

        
    
        <!-- List Users -->
        <div class="panel panel-default">
            <div class="panel-heading">
            <div class="form-group">
                <h3>Liste des utilisateurs (<?php echo $nbrUser ?> utilisateurs)</h3>
                <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" id="search_user" aria-label="Search" placeholder="Rechercher ...">
                    </form>
                </div>
            </div>
            <div class="panel-body" id="myTable">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>login</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Photo</th>
                            <th colspan="3">Acions</th>
                            
                        </tr>
                    </thead>

                    <tbody>
                        <?php while ($user = $resultatUser->fetch()) { ?>
                            <tr class="<?php echo $user['etat'] == 1 ? 'table-success' : 'table-danger' ?>">
                                <td><?php echo $user['login'] ?> </td>
                                <td><?php echo $user['email'] ?> </td>
                                <td><?php echo $user['role'] ?> </td>
                                <td>
                                <?php if ($user['image'] != NULL) { ?>
                                    
                                    <img src="../images/<?php echo $user['image']?>" width="50px" height="50px" class="img-circle">

                                    <?php } else { ?>
                                        <img src="img/user.png" width="50px" height="50px" class="img-circle">
                                    <?php } ?>
                                </td>
                                <td>
                                    <a id="edit" href="editUser.php?idUser=<?php echo $user['iduser'] ?>">
                                        <span class="glyphicon glyphicon-edit">Moditer</span>
                                    </a>
                                </td>
                                <td>
                                    <a href="" class="btn-deleteUser" id="deleteUser"  value="<?php echo $user['iduser'] ?>">
                                        <span class="glyphicon glyphicon-trash">Supprimer</span>
                                    </a>
                                </td>
                                <td>
                                    <a href="" class="btn-activeUser" id="getId" idUseur="<?php echo $user['iduser'] ?>" etat="<?php echo $user['etat'] ?>">
                                        <?php
                                        if ($user['etat'] == 1)
                                            echo '<p><span class="glyphicon glyphicon-ok">Activé</span></p>';
                                        else
                                            echo '<p><span class="glyphicon glyphicon-remove">Désactivé</span></p>';
                                        ?>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div>
                    <ul class="pagination">
                        <?php for ($i = 1; $i <= $nbrPage; $i++) { ?>
                            <li class="<?php if ($i == $page) echo 'active' ?>">
                                <a href="dashboard.php?page=<?php echo $i;?>&login=<?php echo $login ?>&niveau=<?php echo $niveau ?>">
                                    <?php echo $i; ?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>

        <div id="searchresult">

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>