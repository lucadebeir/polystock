<?php
require_once('controller/Controller_Evenements.php');
require_once("controller/Controller_Etat_Utilisateur.php");
require_once('model/Evenements.php'); // chargement du modèle
require_once('model/Users.php'); // chargement du modèle
loggedOnly();



$iduser = Users::Get_User_Id($_COOKIE['cookieperso']);

$evenements=Evenements::Get_All_Evenements($iduser);



$now = date('Y-m-d');
$datetime1 = new DateTime($now);

foreach ($evenements as $r) {
    $datetime2 = new DateTime($r['dateevenement']);
    $interval = $datetime1->diff($datetime2);
    $res = $interval->format('%R%a');
    if ($res > 0) {
        $actif = true;
        Evenements::Update_Actif_Evenement($r['idevent'],$actif,$iduser);
    }
}

?>