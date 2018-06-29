<?php
require_once("model/TypeAlim.php");
require_once("controller/Controller_Etat_Utilisateur.php");
//unloggedOnly();

$type=TypeAlim::Get_All_Type_Alim();

$idstock=htmlspecialchars($_GET['idstock']);

$iduser = Users::Get_User_Id($_COOKIE['cookieperso']);

require_once("view/ajoutAlim.php");
?>