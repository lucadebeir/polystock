<!doctype html>
<html lang="fr">
<head>
    <title>Utilisateurs</title>
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
    <h4 class="center-align">Liste des utilisateurs</h4>
    <table class="bored highlight grey lighten-5">
        <thead>
        <tr>
            <th>Nom de l'utilisateur</th>
            <th>Prénom de l'utilisateur</th>
            <th>Adresse mail de l'utilisateur</th>
        </tr>
        </thead>

        <tbody>
        <?php
        foreach($users as $row) {
            echo "<td> <a href=\"User.php?iduser=".$row['iduser']."\">" . $row['nom'] . "</a></td>";
            echo "<td>" . $row['prenom'] . "</td>";
            echo "<td>" . $row['mail'] . "</td>";
            echo "<td> <a href=\"UpdateAdmin.php?iduser=".$row['iduser']."\"><i class=\"material-icons\">edit</i></a></td>";
            echo "<td> <a href=\"controller/Controller_Suppression_User.php?iduser=".$row['iduser']."\"><i class=\"material-icons\">delete</i></a></td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>
<?php require ("view/footer.php");?>
</body>
</html>