<?php
require_once("model/Goodies.php");
require_once("model/Users.php");
require_once("controller/Controller_Etat_Utilisateur.php");
loggedOnly();


$idgoodies = $_GET['idgoodies'];

$idstock = $_GET['idstock'];

$iduser = Users::Get_User_Id($_COOKIE['cookieperso']);

$nom = Goodies::Get_Nom_Goodies($idgoodies,$idstock,$iduser);
$nombre = Goodies::Get_Nombre_Goodies($idgoodies,$idstock,$iduser);
$prix = Goodies::Get_Prix_Goodies($idgoodies,$idstock,$iduser);

require_once("view/modifGoodies.php");

?>