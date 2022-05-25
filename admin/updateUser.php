<?php
require_once('../dbConfig.php');
require_once('identifier.php');


$iduser=isset($_POST['iduser'])?$_POST['iduser']:0;

$login=isset($_POST['login'])?$_POST['login']:"";

$email=isset($_POST['email'])?$_POST['email']:"";

$role=isset($_POST['role'])?$_POST['role']:"";

$image = $_FILES['image']['name'];
$image_tmp_name = $_FILES['image']['tmp_name'];
move_uploaded_file($image_tmp_name, "../images/".$image);

$requete="update users set login=?,email=? , role=? , image=? where iduser=?";

$params=array($login,$email,$role,$image,$iduser);

$resultat=$pdo->prepare($requete);

$resultat->execute($params);

header('location:dashboard.php');