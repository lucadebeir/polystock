<?php
require_once("controller/Controller_Etat_Utilisateur.php");

$messageErreur = htmlspecialchars($_GET['erreur']);

require("view/erreur.php");
?>
