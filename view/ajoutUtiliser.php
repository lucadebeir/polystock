
<!doctype html>
<html lang="fr">
<head>
    <title>Sélection des produits pour l'évènement</title>
    <meta name="Content-Type" content="UTF-8">
    <meta name="Content-Language" content="fr">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <html>
    <link rel="stylesheet" href="/css/materialize/css/materialize.min.css">
    <link rel="stylesheet" href="/css/style.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" type="image/png" href="medias/favicon.ico" />

    </html>
</head>
<body>
<?php require ("view/header.php");?>
<div>
    <h4 class="center-align">Sélection des produits pour l'évènement</h4>

    <div class="container row z-depth-4 blue-grey lighten-5">

        <form class="col s12" method="post" action="/controller/Controller_Ajout_Utiliser.php?idevent=<?php echo $idevent;?>">

            <div class="row">
                <?php foreach ($utiliser as $row) { ?>
                    <p>
                        <input type="checkbox" id="<?php echo $row['idproduit'];?>" name="boisson[]" value="<?php echo $row['idproduit'];?>" />
                        <label for="<?php echo $row['idproduit'];?>"><?php echo $row['idproduit'];?></label>
                        <?php echo $row['nomproduit'];?>
                    </p>
                <?php };?>
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
