<?php
require_once("../model/Alimentaire.php");
require_once("../model/Users.php");

$type = htmlspecialchars($_POST['type']);
$nom = htmlspecialchars($_POST['nom']);
$nbre = htmlspecialchars($_POST['nombre']);
$prix = htmlspecialchars($_POST['prix']);
$ref = htmlspecialchars($_POST['reference']);

$idstock = htmlspecialchars($_GET['idstock']);

$iduser = Users::Get_User_Id($_COOKIE['cookieperso']);


if (empty($type) || empty($nom)) {
    $messageErreur = 'Vous n\'avez pas remplis tous les champs';

    header("Location: /erreur/".$messageErreur);
}
else {
    Alimentaire::Add_Alim($nom,$prix,$nbre,$type,$ref,$idstock,$iduser);
    header("Location: /stock-alimentaire/".$idstock);
}

require_once('view/ajoutAlim.php');
?>