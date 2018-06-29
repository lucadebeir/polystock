<?php
require_once("model/TypeBoisson.php");
require_once("controller/Controller_Etat_Utilisateur.php");
//unloggedOnly();

$type=TypeBoisson::Get_All_Type_Boisson();

$idstock=htmlspecialchars($_GET['idstock']);



require_once("view/ajoutBoisson.php");
?>