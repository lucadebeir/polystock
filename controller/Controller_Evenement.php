<?php
require_once('model/Utiliser.php'); // chargement du modèle
require_once('model/Evenements.php'); // chargement du modèle
require_once('model/Users.php'); // chargement du modèle

require_once('controller/Controller_Etat_Utilisateur.php');
loggedOnly();

$iduser=Users::Get_User_Id($_COOKIE['cookieperso']);

$utiliser=Utiliser::Get_All_Utiliser($_GET['idevent'],$iduser);




$nom=Evenements::Get_Nom_Evenement($_GET['idevent'],$iduser);
$idevent=htmlspecialchars($_GET['idevent']);

require_once('view/evenement.php');

?>