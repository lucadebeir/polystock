<?php
require_once('model/Boissons.php'); // chargement du modèle
require_once("controller/Controller_Etat_Utilisateur.php");
loggedOnly();

$idstock=htmlspecialchars($_GET['idstock']);

$boissons=Boissons::Get_All_Boissons_Stock($idstock);

require_once('view/boissons.php');

?>