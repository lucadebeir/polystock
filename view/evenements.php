<!doctype html>
<html lang="fr">
<head>
    <title>Evenements</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <html>
    <link rel="stylesheet" href="css/materialize/css/materialize.min.css">
    <link rel="stylesheet" href="css/style.css">
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
    <?php include ("css/css_config.php") ?>
</head>
<body>
<?php require ("view/header.php");?>


<div class="container">

    <table>
        <tbody>
        <tr><td><a class="waves-effect waves-light btn" onclick="afficherEvenementsPast();"><i class="material-icons right">call_received</i>Évènements passés</a></td>

            <td><a class="waves-effect waves-light btn" onclick="afficherEvenementsFuturs();"><i class="material-icons right">call_received</i>Évènements futurs</a></td>

            <td><a class="waves-effect waves-light btn" onclick="afficherToutEvenement();"><i class="material-icons right">call_received</i>Tous les évènements</a></td></tr>
        </tbody>
    </table>

<div class="container" id="eventpast" style="display: none;">
    <h4 class="center-align">Évènements passés</h4>
    <table class="bored highlight grey lighten-5">
        <thead>
        <tr>
            <th>Nom de l'évènement</th>
            <th>Date évènement</th>
        </tr>
        </thead>

        <tbody>

        <?php
        foreach($evenementspast as $row) {
            echo "<td><a href=\"/evenement/".$row['idevent']."\">" . $row['nomevent'] . "</a></td>";
            echo "<td>" . $row['dateevenement'] . "</td>";
            echo "<td><a href=\"/update-event/".$row['idevent']."\"><i class=\"material-icons\">edit</i></a></td>";
            echo "<td><a href=\"controller/Controller_Suppression_Evenement.php?idevent=".$row['idevent']."\"><i class=\"material-icons\">delete</i></a></td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>
<div class="container" id="eventfutur" style="display: none;">
    <h4 class="center-align">Évènements futurs</h4>
    <table class="bored highlight grey lighten-5">
        <thead>
        <tr>
            <th>Nom de l'évènement</th>
            <th>Date évènement</th>
        </tr>
        </thead>

        <tbody>

        <?php
        foreach($evenementsfutur as $row) {
            echo "<td><a href=\"/evenement/".$row['idevent']."\">" . $row['nomevent'] . "</a></td>";
            echo "<td>" . $row['dateevenement'] . "</td>";
            echo "<td><a href=\"/update-event/".$row['idevent']."\"><i class=\"material-icons\">edit</i></a></td>";
            echo "<td><a href=\"controller/Controller_Suppression_Evenement.php?idevent=".$row['idevent']."\"><i class=\"material-icons\">delete</i></a></td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>
<div class="container" id="other" style="display: none;">
    <h4 class="center-align">Tous les évènements</h4>
    <table class="bored highlight grey lighten-5">
        <thead>
        <tr>
            <th>Nom de l'évènement</th>
            <th>Date évènement</th>
        </tr>
        </thead>

        <tbody>

        <?php
        foreach($evenements as $row) {
            echo "<td><a href=\"/evenement/".$row['idevent']."\">" . $row['nomevent'] . "</a></td>";
            echo "<td>" . $row['dateevenement'] . "</td>";
            echo "<td><a href=\"/update-event/".$row['idevent']."\"><i class=\"material-icons\">edit</i></a></td>";
            echo "<td><a href=\"controller/Controller_Suppression_Evenement.php?idevent=".$row['idevent']."\"><i class=\"material-icons\">delete</i></a></td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>
    <br>
<div class="center-align">
    <a href="/ajout-event">
        <button type="button" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i><i class="material-icons right">add</i>Ajouter un évènement</button>
    </a>
</div>
</div>
<?php require ("view/footer.php");?>
</body>
</html>