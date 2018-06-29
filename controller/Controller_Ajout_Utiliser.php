<?php
require_once("../model/Utiliser.php");
require_once("../model/Users.php");

$idevent=htmlspecialchars($_GET['idevent']);

$iduser=Users::Get_User_Id($_COOKIE['cookieperso']);


foreach($_POST['boisson'] as $valeur) {
    Utiliser::Add_Utiliser($idevent,$valeur,$iduser);
}

foreach($_POST['alim'] as $valeur) {
    Utiliser::Add_Utiliser($idevent,$valeur,$iduser);
}

foreach($_POST['goodies'] as $valeur) {
    Utiliser::Add_Utiliser($idevent,$valeur,$iduser);
}

header("Location: /evenement/".$idevent);


require_once('view/ajoutUtiliser.php');
?>