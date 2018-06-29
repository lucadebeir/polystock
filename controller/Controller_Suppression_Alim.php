<?php
require_once ('../model/Alimentaire.php');
require_once ('../model/Users.php');
//require_once("../controller/Controller_Etat_Utilisateur.php");
//isLogged();
$idalim=htmlspecialchars($_GET['idalim']);

$idstock=htmlspecialchars($_GET['idstock']);

$iduser=Users::Get_User_Id($_COOKIE['cookieperso']);

if (empty($idalim)) {
    $messageErreur = 'Vous n\'avez pas remplis tous les champs';

    header("Location: /erreur/".$messageErreur);
}
else {
    Alimentaire::Delete_Alim($idalim,$iduser,$idstock);

    header("Location: /stock-alimentaire/".$idstock);
}


?>