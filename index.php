<?php
require_once('User.php');

if (isset($_POST['login'])) {
    if ($_POST['newPassword'] === $_POST['newPasswordConf']) {
        $newUser->Update($_POST['login'], $_POST['oldPassword'], $_POST['newPassword'], $_POST['newPasswordConf'], $_POST['email'], $_POST['firstname'], $_POST['lastname']);
    }
}
require_once('Post.php');
$result = $newPost->GetLastThreePost();

// var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/index.css" rel="stylesheet" type="text/css" />
    <script async src="script/index.js"></script>

    <title>Acceuil</title>
</head>

<body>

    <?php require_once("Nav/nav.php") ?>

    <div id="Main">

        <h1>Bienvenue sur Blog-JS</h1>
        <h2>Nos derniers articles :</h2>
        <section id="DerniersArticles">
            <?php foreach ($result as $key => $value): ?>
                <section id="DerniersArticles">


                    <article onclick="RedirectArticle( <?= $value['id'] ?> )">

                        <div id="Titre">
                            <?php echo $value['title']; ?>
                        </div>
                        <div id="Category">
                            <?php echo "#" . $value['categoryid']; ?>
                        </div>


                        <div id="Article">
                            <?php echo $value['content']; ?>
                        </div>
                        <div id="ArticleInfo">
                            <?php echo "Ecrit par : <strong>" . $value['userid'] . "</strong> le  " . $value['createdat']; ?>
                        </div>
                    </article>



                </section>
            <?php endforeach; ?>
        </section>

        <div id="VoirArticles" onclick=RedirectConnexion()>
            se connecter pour voir les autres articles ...
        </div>
    </div>
</body>

</html>