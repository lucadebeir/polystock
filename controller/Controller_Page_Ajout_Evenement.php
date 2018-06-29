<?php
require_once ("model/Boissons.php");
require_once ("model/Alimentaire.php");
require_once ("model/Goodies.php");
require_once("controller/Controller_Etat_Utilisateur.php");
loggedOnly();

$boissons=Boissons::Get_All_Boissons();
$alim=Alimentaire::Get_All_Alim();
$goodies=Goodies::Get_All_Goodies();

require_once("view/ajoutEvenement.php");
?>