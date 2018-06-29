<?php
require_once('model/Users.php'); // chargement du modèle
require_once("controller/Controller_Etat_Utilisateur.php");
loggedOnly();

$iduser=Users::Get_User_Id($_COOKIE['cookieperso']);
$user=Users::Get_One_Users($iduser);

require_once('view/user.php');

?>