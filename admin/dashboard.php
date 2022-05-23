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

    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css"> 

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    
    <div class="container">
        <?php include('menu.php');?>
        <div class="panel">
            <div class="panel-heading">Liste des utilisateurs (<?php echo $nbrUser ?> utilisateurs)</div>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-dark">
                    <thead>
                        <tr>
                            <th>login</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Modifié</th>
                            <th>Supprimé</th>
                            <th>Activé</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while ($user = $resultatUser->fetch()) { ?>
                            <tr class="<?php echo $user['etat'] == 1 ? 'table-success' : 'table-danger' ?>">
                                <td><?php echo $user['login'] ?> </td>
                                <td><?php echo $user['email'] ?> </td>
                                <td><?php echo $user['role'] ?> </td>
                                <td>
                                    <a id="edit" href="editUser.php?idUser=<?php echo $user['iduser'] ?>">
                                        <span class="glyphicon glyphicon-edit">éditer</span>
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/index.js"></script>
</body>
</html>