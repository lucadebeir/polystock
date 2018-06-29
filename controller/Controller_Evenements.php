<?php
require_once('model/Evenements.php'); // chargement du modèle
require_once('model/Users.php'); // chargement du modèle
require_once("controller/Controller_Etat_Utilisateur.php");
loggedOnly();

$iduser = Users::Get_User_Id($_COOKIE['cookieperso']);

$evenementspast=Evenements::Get_All_Evenements_Past($iduser);

$evenementsfutur=Evenements::Get_All_Evenements_Futur($iduser);

$evenements=Evenements::Get_All_Evenements($iduser);

require_once('view/evenements.php');

?>