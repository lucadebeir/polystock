<!doctype html>
<html lang="fr">
<head>
    <title>Stock</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <?php include ("css/css_config.php") ?>
    <link rel="icon" href="medias/favicon.ico" />
    <!--<style>
        table {
            width: 100%;
            display: table;
            border-collapse: collapse;
            border-spacing: 0;
            border: none;
        }
        div.general-container {
            margin-top: 10%;
            margin-bottom: 10%;
        }
    </style>-->
</head>
<body>
<?php require ("view/header.php");?>
<br>
<br>
<br>
<br>
<div class="container center">
    <table>
        <thead>
        <tr>
            <th align="center">Nom du stock</th>
        </tr>
        </thead>

        <tbody>
        <?php
        foreach($stock as $row) {
            if ($row['typestock'] == 1) {
                echo "<tr><td align=\"center\"><a href='/stock-boisson/".$row['idstock']."'>" . $row['nomstock'] . "</a></td>";
            } elseif ($row['typestock'] == 2) {
                echo "<tr><td align=\"center\"><a href='/stock-alimentaire/".$row['idstock']."'>" . $row['nomstock'] . "</a></td>";
            } elseif ($row['typestock'] == 3) {
                echo "<tr><td align=\"center\"><a href='/stock-goodies/".$row['idstock']."'>" . $row['nomstock'] . "</a></td>";
            }
            echo "<td> <a href=\"/update-stock/".$row['idstock']."\"><i class=\"material-icons\">edit</i></a></td>";
            echo "<td> <a href=\"controller/Controller_Suppression_Stock.php?idstock=".$row['idstock']."\"><i class=\"material-icons\">delete</i></a></td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>
<br>
<br>
<br>
<div class="center">
    <a href="/ajout-stock">
        <button type="button" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i><i class="material-icons right">add</i>Ajouter un stock</button>
    </a>
</div>
<?php require ("view/footer.php");?>
</body>
</html>