<?php
require_once ("model/TypeStock.php");
require_once("controller/Controller_Etat_Utilisateur.php");
loggedOnly();

$type=TypeStock::Get_All_Type_Stock();


require_once("view/ajoutStock.php");
?>