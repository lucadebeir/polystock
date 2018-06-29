<!doctype html>
<html lang="fr">
<head>
    <title>Evenement</title>
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
        table {
            width: 100%;
            display: table;
            border-collapse: collapse;
            border-spacing: 0;
            border: none;
        }
        div.container {
            margin-top: 10%;
            margin-bottom: 10%;
        }
    </style>
</head>
<body>
<?php require ("view/header.php");?>
<div class="container">
    <h4 class="center-align"><?php echo $nom ;?></h4>
    <br>
    <table class="bored highlight grey lighten-5">
        <thead>
        <tr>
            <!--<th>Type de produit</th>-->
            <th>Nom du produit</th>
            <th>Nombre de produits désirés</th>
            <th>Prix unitaire</th>
            <th>Quantité à commander</th>
            <th>Prix total</th>
        </tr>
        </thead>

        <tbody>
        <?php
        foreach ($utiliser as $row) {
            echo "<td>" . $row['nomproduit'] . "</td>";
            echo "<td>" . $row['nbreproduit'] . "</td>";
            echo "<td>" . $row['prixproduit'] . "</td>";
            echo "<td>" . $row['qtecommande'] . "</td>";
            echo "<td>" . $row['prixtotal'] . "</td>";
            echo "<td> <a href=\"/UpdateUtiliser.php?idevent=".$row['idevent']."&idproduit=".$row['idproduit']."\"><i class=\"material-icons\">edit</i></a></td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>
<div class="center-align sticky-action">
    <a href="/ajout-produit-event/<?php echo $idevent;?>">
        <button type="button" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i><i class="material-icons right">add</i>Ajouter un produit</button>
    </a>
</div>
<?php require ("view/footer.php");?>
</body>
</html>