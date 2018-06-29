
<!doctype html>
<html lang="fr">
<head>
    <title>Ajout d'une boisson</title>
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
    <h4 class="center-align">Ajout d'une boisson</h4>

    <div class="container row z-depth-4 blue-grey lighten-5">

        <form class="col s12" method="post" action="/controller/Controller_Ajout_Boisson.php?idstock=<?php echo $idstock;?>">

            <label for="type">Type de boisson</label>
            <select class="browser-default" name="type" id="type" required>
                <option value="" disabled selected>Choississez votre option</option>
                <?php foreach ($type as $row) { ?>
                    <option value="<?php echo $row['idtype']?>"><?php echo $row['nomtype']?></option>
                <?php };?>
            </select>

            <div class="row">
                <div class="input-field col s9">
                    <input id="nom" name="nom" type="text" class="validate" required>
                    <label for="nom" data-error="wrong" data-success="right">Nom de la boisson</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s9">
                    <input id="reference" name="reference" type="text" class="validate">
                    <label for="reference" data-error="wrong" data-success="right">Référence de la boisson</label>
                </div>
            </div>

            <label for="unite">Unité de la boisson (en cl)</label>
            <select class="browser-default" name="unite" id="unite" required>
                <option value="" disabled selected>Choississez votre option</option>
                <option value="70">70</option>
                <option value="100">100</option>
                <option value="150">150</option>
                <option value="200">200</option>
                <option value="500">500</option>
            </select>

            <div class="row">
                <div class="input-field col s9">
                    <input id="nombre" name="nombre" type="text" class="validate" required>
                    <label for="nombre" data-error="wrong" data-success="right">Nombre de boisson</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s9">
                    <input id="prix" name="prix" type="text" class="validate">
                    <label for="prix" data-error="wrong" data-success="right">Prix</label>
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
