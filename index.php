<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/index.css" rel="stylesheet" type="text/css" />
    <link href="CSS/Article.css" rel="stylesheet" type="text/css" />
    <script async src="index.js"></script>
    <title>Acceuil</title>
</head>

<body>

    <header>
        <h1 onclick=RedirectAcceuil()>Blog-JS</h1>
        <div id="SectionAdmin">acces admin</div>
        <button id="BtConnexion" onclick=RedirectConnexion()>Connexion / Inscription</button>
    </header>

    <div id="Main">
    <h1>Bienvenue sur Blog-JS</h1>
        <section id="DerniersArticles">
            <!-- Conteneur des derniers articles-->
        </section>

        <div id="VoirArticles" onclick=RedirectConnexion()>
            se connecter pour voir les autres articles ...
        </div>
    </div>
</body>

</html>