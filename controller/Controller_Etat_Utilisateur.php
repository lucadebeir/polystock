<?php
require_once("model/Users.php");

function isLogged(){
  if(isset($_COOKIE['cookieperso'])){
    $cookie=$_COOKIE['cookieperso'];
    $user=Users::Get_User_Id($cookie);

    return(!empty($user));
  }
  else return false;
}

function loggedOnly(){
  if(!isLogged()){
    header("Location: /connexion");
  }
}

function unloggedOnly(){
  if(isLogged()){
    header("Location: /accueil");
  }
}

function isAdmin(){
  if(isset($_COOKIE['cookieperso'])){
    $cookie=$_COOKIE['cookieperso'];
    $userid=Users::Get_User_Id($cookie);
    $role=Users::Get_User_Admin($userid);

    if($role==true){
      return true;
    }
    else return false;
  }
  else return false;
}

function adminOnly(){
  if(!isAdmin())
  {
    header("Location: /erreur/err=Vous n'avez pas accès à cette page!");
  }
}
 ?>
