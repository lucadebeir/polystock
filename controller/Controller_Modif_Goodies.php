<?php
require_once("../model/Goodies.php");
require_once("../model/Users.php");

$nom = htmlspecialchars($_POST['nom']);
$nbre = htmlspecialchars($_POST['nombre']);
$prix = htmlspecialchars($_POST['prix']);

$idgoodies = htmlspecialchars($_GET['idgoodies']);

$idstock = htmlspecialchars($_GET['idstock']);

$iduser = Users::Get_User_Id($_COOKIE['cookieperso']);

Goodies::Update_Nom_Goodies($idgoodies,$nom,$idstock,$iduser);
Goodies::Update_Nbre_Goodies($idgoodies,$nbre,$idstock,$iduser);
Goodies::Update_Prix_Goodies($idgoodies,$prix,$idstock,$iduser);
header("Location: /stock-goodies/".$idstock);


require_once('view/modifGoodies.php');
?>