<?php
require_once("model/Users.php");
require_once("controller/Controller_Etat_Utilisateur.php");
loggedOnly();

$iduser = $_GET['iduser'];

$user = Users::Get_One_Users($iduser);

require_once("view/modifUser.php");

?>