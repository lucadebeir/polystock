<?php
require_once("model/Users.php");
require_once("controller/Controller_Etat_Utilisateur.php");
loggedOnly();
adminOnly();

$idamin = Users::Get_User_Id($_COOKIE['cookieperso']);
$admin = Users::Get_User_Admin($iduser);

if ($admin == true) {
    //if ($iduser != $idamin) {
        Users::Update_Admin_Users($iduser,false);
    //}
    header("Location: /administrateur");
} elseif ($admin == false) {
    Users::Update_Admin_Users($iduser,true);
    header("Location: /administrateur");
}

?>