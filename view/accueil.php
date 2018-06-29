<!doctype html>
<html lang="fr">
<head>
    <title>PolyStock</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <?php include ("css/css_config.php") ?>
    <link rel="icon" href="medias/favicon.ico" />
</head>
<body>
<?php
if (empty($iduser)) {
    require ("view/header.php");
} else {
    require ("view/header.php?iduser=".$iduser);
};?>
<br>
    <br>
<?php
if (!isLogged()) { ?>
    <div class="row z-depth-4 blue-grey lighten-5 general-container">
        <div class="input-field col s12">
            <h4>Qu'est-ce que PolyStock ?</h4>
            <p>PolyStock est un site qui permet de gérer des stocks et des évènements.</p>
            <p>Que ce soit pour des goodies, pour des produits alimentaires, ou pour des boissons, PolyStock permet d'enregistrer tout ce que l'on a en sa posession.</p>
            <p>Un bon moyen de prévoir les commandes pour de futurs évènements.</p>
        </div>
    </div>
<?php } else { ?>
<div class="row container input-field">
    <div class="col s12 m5">
        <div class="card-panel z-depth-4 blue-grey lighten-5">
            <h4>Qu'est-ce que PolyStock ?</h4>
            <p>PolyStock est un site qui permet de gérer des stocks et des évènements.</p>
            <p>Que ce soit pour des goodies, pour des produits alimentaires, ou pour des boissons, PolyStock permet d'enregistrer tout ce que l'on a en sa posession.</p>
            <p>Un bon moyen de prévoir les commandes pour de futurs évènements.</p>
        </div>
    </div>
    <div class="col s12 m5">
        <div class="card-panel z-depth-4 blue-grey lighten-5">
            <h4>Évènements à venir</h4>
            <br>
            <?php
            require_once('model/Evenements.php');
            require_once('model/Users.php');

            $iduser = Users::Get_User_Id($_COOKIE['cookieperso']);

            $evenementsfutur=Evenements::Get_All_Evenements_Futur($iduser);

            $now = date('Y-m-d');
            $datetime1 = new DateTime($now);

            foreach($evenementsfutur as $row) {

                $datetime2 = new DateTime($row['dateevenement']);
                $interval = $datetime1->diff($datetime2);
                $res = $interval->format('%a');

                if ($res == 0) {
                    echo "<td><a href=\"/evenement/".$row['idevent']."\">" . $row['nomevent'] . "</a></td>";
                    echo " se déroulera le ";
                    echo "<td>" . $row['dateevenement'] . "</td>";
                    echo " donc ";
                    echo " aujourd'hui ! <br><br>";
                } else {
                    echo "<td><a href=\"/evenement/".$row['idevent']."\">" . $row['nomevent'] . "</a></td>";
                    echo " se déroulera le ";
                    echo "<td>" . $row['dateevenement'] . "</td>";
                    echo " donc dans ";
                    echo "<td>" . $res . "</td>";
                    echo " jours ! <br><br>";
                }


            }

            ?>
        </div>
    </div>
</div>
<?php } ?>


        <?php require ("view/footer.php");?>
</body>
</html>
