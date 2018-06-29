<?php
require_once("../model/Stock.php");

$nomstock = htmlspecialchars($_POST['nom']);
$iduser = htmlspecialchars($_GET['iduser']);
$idstock = htmlspecialchars($_GET['idstock']);

Stock::Update_Nom_Stock($idstock,$iduser,$nomstock);
header("Location: /stocks");


require_once('view/modifStock.php');
?>