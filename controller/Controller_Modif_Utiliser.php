<?php
require_once("../model/Utiliser.php");
require_once("../model/Produit.php");
require_once("../model/Users.php");

$idevent = htmlspecialchars($_GET['idevent']);
$idproduit = htmlspecialchars($_GET['idproduit']);
$nbreproduit = htmlspecialchars($_POST['qte']);

$iduser=Users::Get_User_Id($_COOKIE['cookieperso']);

Utiliser::Update_Nbre_Produit($idproduit,$nbreproduit,$idevent,$iduser);

$nbre = Produit::Get_Nombre_Produit($idproduit);
$prix = Produit::Get_Prix_Produit($idproduit);


if (($nbreproduit) - $nbre > 0) {
    $qtecommande = $nbreproduit - $nbre;
    Utiliser::Update_Qte_Commande($idproduit,$qtecommande,$idevent,$iduser);
    $prixtotal = $qtecommande*$prix;
    Utiliser::Update_Prix_Total($idproduit,$prixtotal,$idevent,$iduser);
} else {
    $qtecommande = 0;
    Utiliser::Update_Qte_Commande($idproduit,$qtecommande,$idevent,$iduser);
    $prixtotal = 0;
    Utiliser::Update_Prix_Total($idproduit,$prixtotal,$idevent,$iduser);
}

header("Location: /evenement/".$idevent);


require_once('view/modifUtiliser.php');
?>