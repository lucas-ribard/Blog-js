<?php
/*
ini_set('display_errors', 1);
error_reporting(E_ALL);
*/
//Recup info session
require_once('User.php');

if (isset($_POST['login'])) {
    if ($_POST['newPassword'] === $_POST['newPasswordConf']) {
        $newUser->Update($_POST['login'], $_POST['oldPassword'], $_POST['newPassword'], $_POST['newPasswordConf'], $_POST['email'], $_POST['firstname'], $_POST['lastname']);
    }
}


if (isset($_GET['page']) && !empty($_GET['page'])) {
    $currentPage = (int) strip_tags($_GET['page']);
} else {
    $currentPage = 1;
}

// On détermine le nombre d'articles par page
$parPage = 3;

// Calcul du 1er article de la page
$premier = ($currentPage * $parPage) - $parPage;
$dernier = ($currentPage * $parPage);
//Recup les articles
require_once('Post.php');

$result = $newPost->GetAllPosts($premier, $parPage);
$NbArticles = count($result);

//nombres d'articles divisé par 3 puis arondis au dessu pour avoir le nombres de pages
$pages = $NbArticles / 3;
$pages = ceil($pages);

if ($currentPage > $pages){
    header('Location:./Articles.php?page=1');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="CSS/index.css" rel="stylesheet" type="text/css" />
    <script async src="script/script.js"></script>

    <title>Articles</title>
</head>

<body>
    <?php require_once("Nav/nav.php") ?>

    <h1 id="Titrepage">Nos Articles</h1>
    <!--
    <div id="Naviguation">
        <div id="Catégories">Catégorie1 . Catégorie1 . Catégorie1 . Catégorie1</div>
        
    </div>
    -->

    <div id="Naviguation">
    <div id="NbArticles"><?= $premier." / ".$NbArticles." Articles" ?></div>
        <ul class="pagination">
            <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
            <li <?php if($currentPage == 1){echo "class='disabled'";}  ?>">
                <a href="./Articles.php?page=<?= $currentPage - 1 ?>">
                    < </a>
            </li>
            <?php for ($page = 1; $page <= $pages; $page++): ?>
                <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                <li <?php if($currentPage == $page){echo "class='active'";}?>>
                    <a href="./Articles.php?page=<?= $page ?>"><?= $page ?></a>
                </li>
            <?php endfor ?>
            <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
            <li <?php if($currentPage == $pages){echo "class='disabled'";}?>">
                <a href="./Articles.php?page=<?= $currentPage + 1 ?>" ">></a>
            </li>
        </ul>

    </div>



    <div id=" Main">
                    <section id="DerniersArticles">
                        <?php while ($premier < $dernier && $premier < $NbArticles) {
                            //on sépare les articles
                            $value = $result[$premier] ?>

                            <article onclick="RedirectArticle( <?= $value['id']?> )">

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

                            <?php $premier++;
                        } ?>

                    </section>
    </div>

    <br>

    <div id="Naviguation">
    <div id="NbArticles"><?= $premier." / ".$NbArticles." Articles" ?></div>
    <ul class="pagination">
            <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
            <li <?php if($currentPage == 1){echo "class='disabled'";}  ?>">
                <a href="./Articles.php?page=<?= $currentPage - 1 ?>">
                    < </a>
            </li>
            <?php for ($page = 1; $page <= $pages; $page++): ?>
                <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                <li class="page-item <?= ($page == $currentPage) ? "active" : "" ?>">
                    <a href="./Articles.php?page=<?= $page ?>"><?= $page ?></a>
                </li>
            <?php endfor ?>
            <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
            <li <?php if($currentPage == $pages){echo "class='disabled'";}?>">
                <a href="./Articles.php?page=<?= $currentPage + 1 ?>" ">></a>
            </li>
        </ul>

    </div>
</body>

</html>