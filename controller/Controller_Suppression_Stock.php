<?php
require_once ('../model/Stock.php');
require_once ('../model/Users.php');
//require_once("../controller/Controller_Etat_Utilisateur.php");
//isLogged();

$idstock=htmlspecialchars($_GET['idstock']);
$iduser=Users::Get_User_Id($_COOKIE['cookieperso']);

if (empty($idstock)) {
    $messageErreur = 'Vous n\'avez pas remplis tous les champs';

    header("Location: /erreur/".$messageErreur);
}
else {

    Stock::Delete_Stock($idstock,$iduser);

    header("Location: /stocks");
}


?>