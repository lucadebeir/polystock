
<!doctype html>
<html lang="fr">
<head>
    <title>Inscription</title>
    <meta name="Content-Type" content="UTF-8">
    <meta name="Content-Language" content="fr">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <link rel="icon" href="medias/favicon.ico" />

    <html>
    <link rel="stylesheet" href="css/materialize/css/materialize.min.css">
    <link rel="stylesheet" href="css/style.css">
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
    <h4 class="center-align">Inscription</h4>

    <div class="container row z-depth-4 blue-grey lighten-5">

        <form class="col s12" method="post" action="/controller/Controller_Inscription.php">

            <!--<div class="switch">
                <label>
                    Non
                    <input id="admin" name="admin" type="checkbox" class="validate">
                    <span class="lever"></span>
                    Oui
                </label>
            </div>-->

            <div class="row">
                <div class="input-field col s9">
                    <input id="email" name="email" type="email" class="validate" required>
                    <label for="email" data-error="wrong" data-success="right">Email</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s9">
                    <input id="nom" name="nom" type="text" class="validate" required>
                    <label for="nom" data-error="wrong" data-success="right">Nom</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s9">
                    <input id="prenom" name="prenom" type="text" class="validate" required>
                    <label for="prenom" data-error="wrong" data-success="right">Prénom</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s9">
                    <input id="age" name="age" type="text" class="validate" required>
                    <label for="age" data-error="wrong" data-success="right">Age</label>
                </div>
            </div>




            <div class="row">
                <div class="input-field col s9">
                    <input id="rue" name="rue" type="text" class="validate" required>
                    <label for="rue" data-error="wrong" data-success="right">Rue</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s9">
                    <input id="codepostal" name="codepostal" type="text" class="validate" required>
                    <label for="codepostal" data-error="wrong" data-success="right">Code postal</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s9">
                    <input id="ville" name="ville" type="text" class="validate" required>
                    <label for="ville" data-error="wrong" data-success="right">Ville</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s9">
                    <input id="telephone" name="telephone" type="text" class="validate" required>
                    <label for="telephone" data-error="wrong" data-success="right">Téléphone</label>
                </div>
            </div>



            <div class="row">
                <div class="input-field col s12">
                    <label for="password">Mot de passe</label>
                    <input id="password" name="password" type="password" class="validate" required>
                </div>
            </div>

            <div class="row">
                <label for="gender">Sexe</label>
                <div class="input-field col s12">
                    <select id="gender" class="browser-default" name="gender" required>
                        <option value="" disabled selected>Choississez votre option</option>
                        <option value="Homme">Homme</option>
                        <option value="Femme">Femme</option>
                    </select>
                </div>
            </div>



            <!--<div class="row">
                <div class="input-field col s12">
    <label for="password_check">Vérification du mot de passe</label>
      <input id="password_check" name="password_check" type="password" class="validate">
    </div>
            </div>-->



            <div class="row">
                <div class="input-field col s9">
                    <button class="btn waves-effect waves-light" id="submit" value="valider">Inscription
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
