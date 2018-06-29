<?php
require_once("model/Evenements.php");
require_once("model/Users.php");
require_once("controller/Controller_Etat_Utilisateur.php");
loggedOnly();

$iduser = Users::Get_User_Id($_COOKIE['cookieperso']);
$identifiant = $_GET['idevent'];

$nom = Evenements::Get_Nom_Evenement($identifiant,$iduser);
$date = Evenements::Get_Date_Evenement($identifiant,$iduser);

require_once("view/modifEvenement.php");

?>