<?php
require_once("model/Stock.php");
require_once("model/Users.php");
require_once("controller/Controller_Etat_Utilisateur.php");
loggedOnly();


$idstock = $_GET['idstock'];
$iduser = Users::Get_User_Id($_COOKIE['cookieperso']);

$nom = Stock::Get_Nom_Stock($idstock,$iduser);

require_once("view/modifStock.php");

?>