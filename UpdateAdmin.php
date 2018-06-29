<?php
require_once ("controller/Controller_Etat_Utilisateur.php");
adminOnly();
loggedOnly();

$iduser = $_GET['iduser'];

require_once ("controller/Controller_Modif_Admin.php");

?>