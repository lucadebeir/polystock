<?php

require_once ("model/Users.php");
require_once ("controller/Controller_Etat_Utilisateur.php");
adminOnly();
isLogged();

$users = Users::Get_All_Users();

require_once ("view/administrateur.php");

?>