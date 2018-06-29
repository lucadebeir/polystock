<?php
require_once ('../model/Goodies.php');
require_once ('../model/Users.php');
//require_once("../controller/Controller_Etat_Utilisateur.php");
//isLogged();

$idgoodies=htmlspecialchars($_GET['idgoodies']);

$idstock=htmlspecialchars($_GET['idstock']);

$iduser=Users::Get_User_Id($_COOKIE['cookieperso']);

if (empty($idgoodies)) {
    $messageErreur = 'Vous n\'avez pas remplis tous les champs';

    header("Location: /erreur/".$messageErreur);
}
else {

    Goodies::Delete_Goodies($idgoodies,$iduser,$idstock);

    header("Location: /stock-goodies/".$idstock);
}


?>