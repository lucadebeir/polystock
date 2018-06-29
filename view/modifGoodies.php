
<!doctype html>
<html lang="fr">
<head>
    <title>Modification d'une boisson</title>
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
    <h4 class="center-align">Modification d'un goodies</h4>

    <div class="container row z-depth-4 blue-grey lighten-5">

        <form class="col s12" method="post" action="/controller/Controller_Modif_Goodies.php?idgoodies=<?php echo $idgoodies;?>&idstock=<?php echo $idstock;?>">

            <label for="nom" data-error="wrong" data-success="right">Nom du goodies</label>
            <div class="row">
                <div class="input-field col s9">
                    <input id="nom" name="nom" type="text" class="validate" value="<?php echo $nom;?>">
                </div>
            </div>

            <label for="nombre" data-error="wrong" data-success="right">Nombre de goodies</label>
            <div class="row">
                <div class="input-field col s9">
                    <input id="nombre" name="nombre" type="text" class="validate" value="<?php echo $nombre;?>">
                </div>
            </div>

            <label for="prix" data-error="wrong" data-success="right">Prix unitaire du goodies (en €)</label>
            <div class="row">
                <div class="input-field col s9">
                    <input id="prix" name="prix" type="text" class="validate" value="<?php echo $prix;?>">
                </div>
            </div>

            <div class="row">
                <div class="input-field col s9">
                    <button class="btn waves-effect waves-light" id="submit" value="valider">Ajout
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
