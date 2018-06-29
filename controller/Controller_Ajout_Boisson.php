<?php
require_once("../model/Boissons.php");
require_once("../model/Users.php");

$typeB = htmlspecialchars($_POST['type']);
$nomB = htmlspecialchars($_POST['nom']);
$uniteB = htmlspecialchars($_POST['unite']);
$nbreB = htmlspecialchars($_POST['nombre']);
$prixB = htmlspecialchars($_POST['prix']);
$ref = htmlspecialchars($_POST['reference']);

$idstock = htmlspecialchars($_GET['idstock']);

$iduser = Users::Get_User_Id($_COOKIE['cookieperso']);



if (empty($typeB) || empty($nomB) || empty($uniteB) || empty($prixB) || empty($ref)) {
    $messageErreur = 'Vous n\'avez pas remplis tous les champs';

    header("Location: /erreur/".$messageErreur);
}
else {
    Boissons::Add_Boisson($nomB,$prixB,$nbreB,$typeB,$ref,$uniteB,$idstock,$iduser);
    header("Location: /stock-boisson/".$idstock);
}

require_once('view/ajoutBoisson.php');
?>