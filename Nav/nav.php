<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/nav.css" rel="stylesheet" type="text/css" />
    <script async src="script/nav.js"></script>
    <title>Document</title>
</head>
<body>
<header>
        <h1 onclick=RedirectAcceuil()>Blog-JS</h1>
        <div id="SectionAdmin">    <!-- faire logique si admin afficher les options d'admins'--></div>
        <ul>
            <!-- faire logique si connecté affiche "disconnect" / si pas connecté afficher 'co / insc'-->
        <button id="BtConnexion" onclick=RedirectConnexion()>Connexion / Inscription</button>
        <button id="BtConnexion" onclick=RedirectDéConnexion()>Disconnect</button>
                <li><a href="./index.php">Home</a></li>
                <li><a href="./Articles.php">Articles</a></li>
               
            </ul>
    </header>
</body>
</html>
