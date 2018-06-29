<?php
require_once ('../model/Evenements.php');
require_once ('../model/Users.php');
//require_once("../controller/Controller_Etat_Utilisateur.php");
//isLogged();
$idevent=htmlspecialchars($_GET['idevent']);

$iduser=Users::Get_User_Id($_COOKIE['cookieperso']);

if (empty($idevent)) {
    $messageErreur = 'Vous n\'avez pas remplis tous les champs';

    header("Location: /erreur/".$messageErreur);
}
else {
    Evenements::Delete_Evenement($idevent,$iduser);

    header("Location: /evenements");
}


?>