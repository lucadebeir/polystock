<?php
require_once("../model/Goodies.php");
require_once("../model/Users.php");

$nom = htmlspecialchars($_POST['nom']);
$nbre = htmlspecialchars($_POST['nombre']);
$prix = htmlspecialchars($_POST['prix']);

$idstock = htmlspecialchars($_GET['idstock']);

$iduser = Users::Get_User_Id($_COOKIE['cookieperso']);

if (empty($nom) || empty($prix)) {
    $messageErreur = 'Vous n\'avez pas remplis tous les champs';

    header("Location: /erreur/".$messageErreur);
}
else {
    Goodies::Add_Goodies($nom,$prix,$nbre,$idstock,$iduser);
    header("Location: /stock-goodies/".$idstock);
}

require_once('view/ajoutGoodies.php');
?>