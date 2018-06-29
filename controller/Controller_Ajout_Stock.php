<?php
require_once("../model/Stock.php");
require_once("../model/Users.php");

$nom = htmlspecialchars($_POST['nom']);
$type = htmlspecialchars($_POST['type']);

$iduser = Users::Get_User_Id($_COOKIE['cookieperso']);




if (empty($nom)) {
    $messageErreur = 'Vous n\'avez pas remplis tous les champs';

    header("Location: /erreur/".$messageErreur);
}
else {
    Stock::Add_Stock($nom,$iduser,$type);
    header("Location: /stocks");
}

require_once('view/ajoutStock.php');
?>