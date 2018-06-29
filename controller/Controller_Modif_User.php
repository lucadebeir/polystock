<?php
require_once ("../model/Users.php");


$mail = htmlspecialchars($_POST['email']);
$nom = htmlspecialchars($_POST['nom']);
$prenom = htmlspecialchars($_POST['prenom']);
$age = htmlspecialchars($_POST['age']);
$rue = htmlspecialchars($_POST['rue']);
$codepostal = htmlspecialchars($_POST['codepostal']);
$ville = htmlspecialchars($_POST['ville']);
$telephone = htmlspecialchars($_POST['telephone']);
$gender = htmlspecialchars($_POST['gender']);
$iduser = htmlspecialchars($_GET['iduser']);

if (empty($prenom) || empty($nom) || empty($age) || empty($rue) || empty($codepostal) || empty($ville) || empty($mail) || empty($gender)) {
    $messageErreur = 'Vous n\'avez pas remplis tous les champs';

    header("Location: /erreur/".$messageErreur);
}

else {
    Users::Update_User_Mail($iduser,$mail);
    Users::Update_User_Nom($iduser,$nom);
    Users::Update_User_Prenom($iduser,$prenom);
    Users::Update_User_Age($iduser,$age);
    Users::Update_User_Rue($iduser,$rue);
    Users::Update_User_CP($iduser,$codepostal);
    Users::Update_User_Ville($iduser,$ville);
    Users::Update_User_Tel($iduser,$telephone);
    Users::Update_User_Sexe($iduser,$gender);
    header("Location: /info");
}

require_once('view/modifUser.php');
?>
