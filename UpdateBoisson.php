<?php
require_once("model/Boissons.php");
require_once("model/Users.php");
require_once("controller/Controller_Etat_Utilisateur.php");
loggedOnly();


$identifiant = $_GET['idboisson'];

$idstock = $_GET['idstock'];

$iduser = Users::Get_User_Id($_COOKIE['cookieperso']);

$nom = Boissons::Get_Nom_Boisson($identifiant,$idstock,$iduser);
$nombre = Boissons::Get_Nombre_Boisson($identifiant,$idstock,$iduser);
$unite = Boissons::Get_Unite_Boisson($identifiant,$idstock,$iduser);
$prix = Boissons::Get_Prix_Boisson($identifiant,$idstock,$iduser);

require_once("view/modifBoisson.php");

?>
