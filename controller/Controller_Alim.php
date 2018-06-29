<?php
require_once('model/Alimentaire.php'); // chargement du modèle
require_once("controller/Controller_Etat_Utilisateur.php");
loggedOnly();

$idstock=htmlspecialchars($_GET['idstock']);

$alim=Alimentaire::Get_All_Alim_Stock($idstock);

require_once('view/alim.php');

?>