<?php
require_once("../model/Evenements.php");
require_once ('../model/Users.php');

//$boissons = Boissons::Get_All_Boissons();



$date = htmlspecialchars($_POST['date']);
$nom = htmlspecialchars($_POST['nom']);

$iduser = Users::Get_User_Id($_COOKIE['cookieperso']);


if (empty($date) || empty($nom)) {
    $messageErreur = 'Vous n\'avez pas remplis tous les champs';

    header("Location: /erreur/".$messageErreur);
}
else {
    Evenements::Add_Evenement($nom,$date,$iduser);
    /*$idevent = Evenements::Select($nom);

    foreach($_POST['produit'] as $valeur)
    {
        Utiliser::Add_Utiliser($idevent,$valeur);
    }*/

    header("Location: ../evenements");

}

require_once('view/ajoutEvenement.php');
?>