<nav>
    <div class="nav-wrapper">
        <a href="" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <a href="/accueil" class="brand-logo right"><i class="large material-icons right">groupe</i>PolyStock</a>
        <ul class="side-nav left-aligned" id="mobile-demo">
            <li><a href="/accueil">Accueil</a></li>
            <?php if(isLogged()) { ?><li><a href="/info">Mon compte</a></li><?php } ?>
            <?php if(isAdmin()) { ?><li><a href="/administrateur">Administrateur</a></li><?php } ?>
            <?php if(isLogged()) { ?><li><a href="/stocks">Mes stocks</a></li><?php } ?>
            <?php if(isLogged()) { ?><li><a href="/evenements">Mes évènements</a></li><?php } ?>
            <?php if(!isLogged()) { ?><li><a href="/connexion">Connexion</a></li><?php } ?>
            <?php if(isLogged()) { ?><li><a title="Déconnexion" href="/deconnexion"><i class="large material-icons">power_settings_new</i></a></li><?php } ?>
        </ul>
        <ul id="nav-mobile" class="left hide-on-med-and-down">
            <li><a href="/accueil">Accueil</a></li>
            <?php if(isLogged()) { ?><li><a href="/info">Mon compte</a></li><?php } ?>
            <?php if(isAdmin()) { ?><li><a href="/administrateur">Administrateur</a></li><?php } ?>
            <?php if(isLogged()) { ?><li><a href="/stocks">Mes stocks</a></li><?php } ?>
            <?php if(isLogged()) { ?><li><a href="/evenements">Mes évènements</a></li><?php } ?>
            <?php if(!isLogged()) { ?><li><a href="/connexion">Connexion</a></li><?php } ?>
            <?php if(isLogged()) { ?><li><a title="Déconnexion" href="/deconnexion"><i class="large material-icons">power_settings_new</i></a></li><?php } ?>
        </ul>
    </div>
</nav>

<br>
<script>
    $( document ).ready(function(){
        $(".button-collapse").sideNav();
    })
</script>

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-90376618-1', 'auto');
    ga('send', 'pageview');
</script>