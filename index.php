<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/index.css" rel="stylesheet" type="text/css" />
    <link href="CSS/Article.css" rel="stylesheet" type="text/css" />
    <script async src="script/index.js"></script>
    <title>Acceuil</title>
</head>

<body>

    <?php require_once("Nav/nav.php")    ?>

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