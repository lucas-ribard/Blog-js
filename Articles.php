<?php
require_once('User.php');

if (isset($_POST['login'])) {
    if ($_POST['newPassword'] === $_POST['newPasswordConf']) {
        $newUser->Update($_POST['login'], $_POST['oldPassword'], $_POST['newPassword'], $_POST['newPasswordConf'], $_POST['email'], $_POST['firstname'], $_POST['lastname']);
    }
}
require_once('Post.php');
$result = $newPost->GetAllPosts();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="CSS/index.css" rel="stylesheet" type="text/css" />
    <script async src="script/index.js">var passedArray = <?php echo json_encode('.$result.'); ?>;




    </script>

    <title>Articles</title>
</head>

<body>
    <?php require_once("Nav/nav.php") ?>

    <h1>Nos Articles</h1>
    <div id="Naviguation">
        <div id="Catégories">Catégorie1 Catégorie1 Catégorie1 Catégorie1</div>
        <div id="Pages"> page 1.2.3.4 </div>
    </div>

    <div id="Main">
        <section id="DerniersArticles">
            <?php foreach ($result as $key => $value): ?>
                <article id="ArticleBox">
                    <div id="Titre">
                        <?php echo $value['title']; ?>
                    </div>
                    <div id="Article">
                        <?php echo $value['content'] ;?>
                    </div>
                </article>
            <?php endforeach; ?>
        </section>
    </div>

    <div id="Naviguation">
        <div></div>
        <div id="Pages"> page 1.2.3.4 </div>
    </div>
</body>

</html>