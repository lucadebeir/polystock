<?php
require_once("../model/Users.php");

$mail=htmlspecialchars($_POST['email']);
$password=htmlspecialchars($_POST['password']);

if(empty($mail) || empty($password)){
  $message="Merci de remplir tous les champs!";
  header("Location: ../Erreur.php?erreur=".$message);
}

else
{

  if(Users::Check_Password($mail,$password)){

    $cookiecode=substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);
    $cookie=password_hash($cookiecode, PASSWORD_DEFAULT);
    setcookie("cookieperso", $cookie, time()+(60*60*24*30), "/");
    Users::Set_User_Cookie($mail,$cookie);
    header("Location: ../accueil");

  }

  else {
    $message="Mauvais mot de passe !";
    header("Location: ../Erreur.php?erreur=".$message);
  }
}

?>
