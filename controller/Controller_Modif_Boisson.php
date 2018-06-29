<?php
require_once("../model/Boissons.php");
require_once("../model/Users.php");

$nomB = htmlspecialchars($_POST['nom']);
$uniteB = htmlspecialchars($_POST['unite']);
$nbreB = htmlspecialchars($_POST['nombre']);
$prixB = htmlspecialchars($_POST['prix']);
$identifiant = htmlspecialchars($_GET['idboisson']);

$idstock = htmlspecialchars($_GET['idstock']);

$iduser = Users::Get_User_Id($_COOKIE['cookieperso']);

Boissons::Update_Unite_Boisson($identifiant,$uniteB,$idstock,$iduser);
Boissons::Update_Nom_Boisson($identifiant,$nomB,$idstock,$iduser);
Boissons::Update_Nbre_Boisson($identifiant,$nbreB,$idstock,$iduser);
Boissons::Update_Prix_Boisson($identifiant,$prixB,$idstock,$iduser);
header("Location: /stock-boisson/".$idstock);


require_once('view/modifBoisson.php');
?>