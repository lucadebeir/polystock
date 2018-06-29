<!doctype html>
<html lang="fr">
	<head>
		<title>Erreur</title>
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
		 <?php include ("css/css_config.php") ?>
	</head>
	<body>
		<?php require ("view/header.php");?>
        <br>
    <div class="container">
        <?php echo $messageErreur;?>
    </div>
        <?php require ("view/footer.php");?>
  	</body>
  </html>
