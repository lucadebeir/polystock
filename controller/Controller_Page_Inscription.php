<?php
require_once("model/Users.php");
require_once("controller/Controller_Etat_Utilisateur.php");
unloggedOnly();

$lesUsers=Users::Get_All_Users();

require_once("view/inscription.php");
?>
