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
$password = htmlspecialchars($_POST['password']);
$gender = htmlspecialchars($_POST['gender']);

if (empty($prenom) || empty($nom) || empty($age) || empty($rue) || empty($codepostal) || empty($ville) || empty($mail) || empty($gender) || empty($password)) {
		$messageErreur = 'Vous n\'avez pas remplis tous les champs';

		header("Location: ../Erreur.php?erreur=".$messageErreur);
	}
	elseif (strlen($password)<6) {
		$messageErreur = 'Votre mot de passe doit faire plus de 6 caractères';

		header("Location: ../Erreur.php?erreur=".$messageErreur);
	}
else {

    $password=password_hash($password, PASSWORD_DEFAULT);
  	$cookiecode=substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);
    $cookie=password_hash($cookiecode, PASSWORD_DEFAULT);
  	setcookie('cookieperso', $cookie, time()+(60*60*30), "/");


  Users::Add_User($mail,$nom,$prenom,$age,$rue,$codepostal,$ville,$telephone,$password,$cookie,$gender);
  header("Location: /accueil");
}

require_once('view/inscription.php');
?>
