<!doctype html>
<html lang="fr">
<head>
    <title>Modification d'une soirée</title>
    <meta name="Content-Type" content="UTF-8">
    <meta name="Content-Language" content="fr">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <link rel="icon" href="medias/favicon.ico" />

    <html>
    <link rel="stylesheet" href="/css/materialize/css/materialize.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="../css/materialize/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" type="image/png" href="medias/favicon.ico" />
    <script src="../css/hider.js"></script>

    </html>
</head>
<body>
<?php require ("view/header.php");?>
<div>
    <h4 class="center-align">Modification des données d'un évènement</h4>

    <div class="container row z-depth-4 blue-grey lighten-5">

        <form class="col s12" method="post" action="/controller/Controller_Modif_Utiliser.php?idevent=<?php echo $idevent;?>&idproduit=<?php echo $idproduit;?>">

            <div class="row">
                <div class="input-field col s9">
                    <label for="qte" data-error="wrong" data-success="right">Nombre de bouteille souhaitée</label>
                    <input id="qte" name="qte" type="number" class="validate" value="<?php echo $nbreproduit;?>">
                </div>
            </div>

            <div class="row">
                <div class="input-field col s9">
                    <button class="btn waves-effect waves-light" id="submit" value="valider">Modifier
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>
<?php require ("view/footer.php");?>
</body>
</html>
