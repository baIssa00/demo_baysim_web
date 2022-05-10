<?php
    if ($_GET['idUser'] == 1) {
        die('ok');
    } else {
        header('500 Interval Server Error ', true, 500);
        die('not ok');
    }
    session_start();
    if(isset($_SESSION['user'])){
        
        require_once('identifier.php');
        require_once('../dbConfig.php');
        
        $idUser=isset($_GET['idUser'])?$_GET['idUser']:0;

        $requete="delete from users where iduser=?";
        
        $params=array($idUser);
        
        $resultat=$pdo->prepare($requete);
        
        $resultat->execute($params);
        
            header('location:dashboard.php');   
        
     }else {
        header('location:login.php');
    }
    
?>