<?php
require_once ('../model/Boissons.php');
require_once ('../model/Users.php');
//require_once("../controller/Controller_Etat_Utilisateur.php");
//isLogged();
$idboisson=htmlspecialchars($_GET['idboisson']);

$iduser=Users::Get_User_Id($_COOKIE['cookieperso']);

$idstock=htmlspecialchars($_GET['idstock']);

if (empty($idboisson)) {
    $messageErreur = 'Vous n\'avez pas remplis tous les champs';

    header("Location: /erreur/".$messageErreur);
}
else {
    Boissons::Delete_Boisson($idboisson,$iduser,$idstock);

    header("Location: /stock-boisson/".$idstock);
}


?>