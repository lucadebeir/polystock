<?php
require_once('model/Users.php'); // chargement du modèle
require_once("controller/Controller_Etat_Utilisateur.php");
loggedOnly();

$iduser=htmlspecialchars($_GET['iduser']);
$user=Users::Get_One_Users($iduser);

require_once('view/user.php');

?>