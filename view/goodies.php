<!doctype html>
<html lang="fr">
<head>
    <title>Goodies</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <html>
    <link rel="stylesheet" href="/css/materialize/css/materialize.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="../css/materialize/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" type="image/png" href="medias/favicon.ico" />
    <script src="../css/hider.js"></script>

    </html>
    <link rel="icon" href="medias/favicon.ico" />
    <style>
        /*table {
            width: 100%;
            display: table;
            border-collapse: collapse;
            border-spacing: 0;
            border: none;
        }
        div.container {
            margin-top: 10%;
            margin-bottom: 10%;
        }*/
        td, th {
            text-align: center;
        }
    </style>
</head>
<body>
<?php require ("view/header.php");?>
<div class="container">
    <h4 class="center-align">Stock des goodies</h4>
    <table class="bored highlight grey lighten-5">
        <thead>
        <tr>
            <th>Nom du goodies</th>
            <th>Nombre de goodies en stock</th>
            <th>Prix à l'unité (en €)</th>
        </tr>
        </thead>

        <tbody>
        <?php
        foreach($goodies as $row) {
            echo "<td>" . $row['nomproduit'] . "</td>";
            echo "<td>" . $row['qtestock'] . "</td>";
            echo "<td>" . $row['prixproduit'] . "</td>";
            echo "<td> <a href=\"/update-goodies/".$row['idgoodies']."/".$idstock."\"><i class=\"material-icons\">edit</i></a></td>";
            echo "<td> <a href=\"/controller/Controller_Suppression_Goodies.php?idgoodies=".$row['idgoodies']."&idstock=".$idstock."\"><i class=\"material-icons\">delete</i></a></td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>
<div class="center-align sticky-action">
    <a href="/ajout-goodies/<?php echo $idstock ;?>">
        <button type="button" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i><i class="material-icons right">add</i>Ajouter un goodies</button>
    </a>
</div>
<?php require ("view/footer.php");?>
</body>
</html>