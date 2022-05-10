<?php
//Recherche par login et id
function search_byLoginId($login, $id)
{
    global $pdo;
    $req = $pdo->prepare("select * from users where login=? and iduser!=?");
    $valeur = array($login, $id);
    $req->execute($valeur);
    $nbr_user = $req->rowCount();
    return $nbr_user;
}

//Recherche par login
function search_login($login)
{
    global $pdo;
    $req = $pdo->prepare("select * from users where login=?");
    $valeur = array($login);
    $req->execute($valeur);
    $nbr_user = $req->rowCount();
    return $nbr_user;
}

//Recherche par email
function search_email($email)
{
    global $pdo;
    $requete = $pdo->prepare("select * from users where email =?");
    $requete->execute(array($email));
    return $requete->rowCount();
}
