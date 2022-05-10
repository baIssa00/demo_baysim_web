<?php
require_once('identifier.php');
require_once('dbConfig.php');

$iduser=isset($_POST['iduser'])?$_POST['iduser']:0;

$login=isset($_POST['login'])?$_POST['login']:"";

$email=isset($_POST['email'])?$_POST['email']:"";

$password=isset($_POST['password'])?$_POST['password']:"";

$npassword=isset($_POST['npassword'])?$_POST['npassword']:"";

if ($password == $npassword) {
    $requete="update users set login=?,email=? , password=? where iduser=?";

    $params=array($login,$email,md5($password),$iduser);

    $resultat=$pdo->prepare($requete);

    $resultat->execute($params);

    header('location:home.php');
}else{
    $_SESSION['erreurLogin'] = "<p class='btn active'><strong>Erreur!</strong><br> Les mots de passe ne sont pas les memes !</p>";
    header('location:edit.php');
}
