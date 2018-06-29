<?php
require_once('model/Goodies.php'); // chargement du modèle
require_once("controller/Controller_Etat_Utilisateur.php");
loggedOnly();

$idstock=htmlspecialchars($_GET['idstock']);

$goodies=Goodies::Get_All_Goodies_Stock($idstock);

require_once('view/goodies.php');

?>