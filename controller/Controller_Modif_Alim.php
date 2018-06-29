<?php
require_once("../model/Alimentaire.php");
require_once("../model/Users.php");

$nom = htmlspecialchars($_POST['nom']);
$nbre = htmlspecialchars($_POST['nombre']);
$prix = htmlspecialchars($_POST['prix']);
$idalim = htmlspecialchars($_GET['idalim']);

$idstock = htmlspecialchars($_GET['idstock']);

$iduser = Users::Get_User_Id($_COOKIE['cookieperso']);

Alimentaire::Update_Nom_Alim($idalim,$nom,$idstock,$iduser);
Alimentaire::Update_Nbre_Alim($idalim,$nbre,$idstock,$iduser);
Alimentaire::Update_Prix_Alim($idalim,$prix,$idstock,$iduser);
header("Location: /stock-alimentaire/".$idstock);


require_once('view/modifAlim.php');
?>