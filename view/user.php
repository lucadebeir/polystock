<!doctype html>
<html lang="fr">
<head>
    <title>Information sur <?php echo $user['prenom'];?> <?php echo $user['nom'];?></title>
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
        p {
            text-align: center;
        }
    </style>
</head>
<body>
<?php require ("view/header.php");?>
<div class="container">
    <h4 class="center-align">Information sur <?php echo $user['prenom'];?> <?php echo $user['nom'];?></h4>
    <p>
        <?php
            echo $user['prenom'] . " " . $user['nom'];
            echo "<br>";
            echo "Mail : " . $user['mail'];
            echo "<br>";
            echo "Age : " . $user['age'] . "ans";
            echo "<br>";
            echo "Adresse : " . $user['rue'] . "<br>" . $user['codepostale'] . " " . $user['ville'];
            echo "<br>";
            echo "Téléphone : " . $user['telephone'];
            echo "<br>";
        ?>
    </p>
</div>
<div class="center-align sticky-action">
    <a href="/update-user/<?php echo $user['iduser'];?>"><button type="button" class="btn btn-primary">Modifier</button></a>
</div>
<br>
<?php if ($user['admin'] == true) { ?>
    <div class="center-align sticky-action">
        <a href="administrateur"><button type="button" class="btn btn-primary">Retour</button></a>
    </div>
<?php }; ?>
<?php require ("view/footer.php");?>
</body>
</html>