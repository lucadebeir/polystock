
<!doctype html>
<html lang="fr">
<head>
    <title>Page de connexion</title>
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
</head>
<body>
    <?php require ("view/header.php");?>
<div>
    <h4 class="center-align">Connexion</h4>
    <div class="container">
        <form class="col s12" method="POST" action="controller/Controller_Connexion.php">
            <div class="row">
                <div class="input-field col s12">
                    <label for="email">Mail</label>
                    <input id="email" name="email" type="text" class="validate">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" class="validate">
                </div>
            </div>

            <div class="input-field col s9">
                <table class="bored highlight grey lighten-5">
                    <tr><td>
                            <button class="btn waves-effect waves-light" id="submit" value="valider">Connexion
                                <i class="material-icons right">send</i></td>
                        </button>
                        <td><a class="waves-effect waves-light btn" href="/inscription"><i class="material-icons left">library_add</i>Inscription</a></td></tr>
                </table>
            </div>
        </form>
    </div>
</div>
    <?php require ("view/footer.php");?>
</body>
</html>
