<?php
require_once("model/Utiliser.php");
require_once("model/Users.php");
require_once("controller/Controller_Etat_Utilisateur.php");
loggedOnly();

$iduser=Users::Get_User_Id($_COOKIE['cookieperso']);
$idproduit = $_GET['idproduit'];
$idevent = $_GET['idevent'];

$nbreproduit = Utiliser::Get_Nbre_Produit($idproduit,$idevent,$iduser);

require_once("view/modifUtiliser.php");

?>
