<!doctype html>
<html lang="fr">
<head>
    <title>Produits alimentaires</title>
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
    <h4 class="center-align">Stock des produits alimentaires</h4>
    <table class="bored highlight grey lighten-5">
        <thead>
        <tr>
            <th>Type d'aliment</th>
            <th>Nom du produit</th>
            <th>Référence</th>
            <th>Nombre de produit alimentaire en stock</th>
            <th>Prix à l'unité (en €)</th>
        </tr>
        </thead>

        <tbody>
        <?php
        foreach($alim as $row) {
            if ($row['typealim']==1) {
                echo "<td>Légumes et fruits frais</td>";
            } elseif ($row['typealim']==2) {
                echo "<td>Viandes, poissons, oeufs</td>";
            } elseif ($row['typealim']==3) {
                echo "<td>Pain, pâtes, riz, pomme de terre</td>";
            } elseif ($row['typealim']==4) {
                echo "<td>Produits sucrés</td>";
            } elseif ($row['typealim']==5) {
                echo "<td>Lait et produits laitiers</td>";
            } elseif ($row['typealim']==6) {
                echo "<td>Corps gras</td>";
            }
            echo "<td>" . $row['nomproduit'] . "</td>";
            echo "<td>" . $row['referencealim'] . "</td>";
            echo "<td>" . $row['qtestock'] . "</td>";
            echo "<td>" . $row['prixproduit'] . "</td>";
            echo "<td> <a href=\"/update-alim/".$row['idalim']."/".$idstock."\"><i class=\"material-icons\">edit</i></a></td>";
            echo "<td> <a href=\"/controller/Controller_Suppression_Alim.php?idalim=".$row['idalim']."&idstock=".$idstock."\"><i class=\"material-icons\">delete</i></a></td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>
<div class="center-align sticky-action">
    <a href="/ajout-alim/<?php echo $idstock ;?>">
        <button type="button" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i><i class="material-icons right">add</i>Ajouter un produit alimentaire</button>
    </a>
</div>
<?php require ("view/footer.php");?>
</body>
</html>