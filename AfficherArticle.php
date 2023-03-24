<?php
/*
ini_set('display_errors', 1);
error_reporting(E_ALL);
*/
require_once('Post.php');
// -------- affichage de l'article ------------------
if (isset($_GET['Articleid']) && !empty($_GET['Articleid'])) {
    $currentArticle = (int) strip_tags($_GET['Articleid']);

} else {
    header('Location:/Blog-js/index.php');
}
$Value = $newPost->GetArticle($currentArticle);
$Value = $Value[0]; //probleme array dans array, array[ 0 => array [ notre data]]



$Results = $newPost->GETComment($Value["id"]);

// ------------- CReation de commentaire ------------
if (isset($_GET['BTComment'])) {
    if (!isset($_SESSION['login'])) {
        header("location:/Blog-js/register.php");
    } else {
        $newPost->Comment($_SESSION['login'], $Value["id"], $_GET['commentaire']);
        header("location:http://localhost/Blog-js/AfficherArticle.php?Articleid=" . $Value["id"]);// header sinon quand on refresh la page avec des valeurs dans le get sa crée plusieurs fois le meme commentaire
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Article.css">
    <script src="script/register.js" defer></script>
    <title>
        <?= $Value['title'] ?>
    </title>
</head>

<body>

    <?php require_once("Nav/nav.php") ?>
    <div id="MainArticle">
        <h1>
            <?= $Value['title'] ?>
        </h1>
        <p id="catégories">#
            <?= $Value['categoryid'] ?>
        </p>

        <p id="content">
            <?= $Value['content'] ?>
        </p><br>
        <div id="ArticleInfo">
            <?php echo "Ecrit par : <strong>" . $Value['userid'] . "</strong> le  " . $Value['createdat']; ?>
        </div>


        <div id="comments">
            <?php foreach ($Results as $key => $Result): ?>
                <?= "<div class='Com'><div class='ComInfo'>" . "<div>" . $Result['id_User'] . "</div>" . " " . $Result['date'] . "</div><br>" ."<div id='commentaire'>". $Result['Commentaire'] . "</div></div><br>" ?>
            <?php endforeach; ?>
        </div>
    </div>

    <div id="comment">
        <h2>Ajouter un commentaire</h2>
        <form>
            <input id="Articleid" name="Articleid" type="hidden" value="<?= $Value["id"] ?>">
            <!-- input invisible pour ne pas perdre l'id de l'article de la page -->
            <textarea name="commentaire" id="commentaire" cols="30" rows="5"
                placeholder="Votre Commentaire" required></textarea><br><br>
            <button id="addBtn" name="BTComment">Commenter</button>
        </form>
    </div>
</body>

</html>