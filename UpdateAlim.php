<?php
require_once("model/Alimentaire.php");
require_once("controller/Controller_Etat_Utilisateur.php");
loggedOnly();


$idalim = $_GET['idalim'];

$idstock = $_GET['idstock'];

$iduser = Users::Get_User_Id($_COOKIE['cookieperso']);

$nom = Alimentaire::Get_Nom_Alim($idalim,$idstock,$iduser);
$nombre = Alimentaire::Get_Nombre_Alim($idalim,$idstock,$iduser);
$prix = Alimentaire::Get_Prix_Alim($idalim,$idstock,$iduser);

require_once("view/modifAlim.php");

?>