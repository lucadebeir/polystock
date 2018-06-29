<?php
require_once("../model/Evenements.php");
require_once("../model/Users.php");

$iduser=Users::Get_User_Id($_COOKIE['cookieperso']);
$identifiant = htmlspecialchars($_GET['id']);
$nom = htmlspecialchars($_POST['nom']);
$date = htmlspecialchars($_POST['date']);

Evenements::Update_Nom_Evenement($identifiant,$nom,$iduser);
Evenements::Update_Date_Evenement($identifiant,$date,$iduser);

header("Location: /evenements");


require_once('view/modifEvenement.php');
?>