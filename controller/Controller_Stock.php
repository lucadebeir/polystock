<?php
require_once("model/Stock.php"); // chargement du modèle
require_once("controller/Controller_Etat_Utilisateur.php");
loggedOnly();

$iduser=Users::Get_User_Id($_COOKIE['cookieperso']);

$stock=Stock::Get_All_Stock($iduser);

require_once("view/stock.php");
?>