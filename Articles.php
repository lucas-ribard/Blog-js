<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/index.css" rel="stylesheet" type="text/css" />
    <script async src="index.js"></script>
    <title>Articles</title>
</head>

<body>
    <header>
        <h1 onclick=RedirectAcceuil()>Blog-JS</h1>
        <div id="SectionAdmin">acces admin</div>
        <button id="BtConnexion" onclick=RedirectConnexion()>Connexion / Inscription</button>
    </header>

    <h1>Nos Articles</h1>
    <div id="Naviguation">
        <div id="Catégories">Catégorie1 Catégorie1 Catégorie1 Catégorie1</div>
        <div id="Pages"> page 1.2.3.4 </div>
    </div>

    <div id="Main">
        <section id="DerniersArticles">
            <!-- Conteneur des derniers articles-->
        </section>
    </div>

    <div id="Naviguation">
        <div></div>
        <div id="Pages"> page 1.2.3.4 </div>
    </div>
</body>

</html>