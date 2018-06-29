<?php
require_once ("model/Utiliser.php");
require_once ("model/Users.php");
require_once ("model/Produit.php");

require_once("controller/Controller_Etat_Utilisateur.php");
loggedOnly();

$idevent = htmlspecialchars($_GET['idevent']);

$iduser=Users::Get_User_Id($_COOKIE['cookieperso']);

$utiliser=Utiliser::Get_All_Utiliser_2($iduser);



require_once("view/ajoutUtiliser.php");
?>