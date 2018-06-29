<?php
require_once ('../model/Users.php');
//require_once("../controller/Controller_Etat_Utilisateur.php");
//isLogged();

$iduser=htmlspecialchars($_GET['iduser']);

if (empty($iduser)) {
    $messageErreur = 'Vous ne pouvez pas supprimer cet utilisateur !';

    header("Location: /erreur/".$messageErreur);
}
else {

    Users::Delete_User($iduser);

    header("Location: /administrateur");
}


?>