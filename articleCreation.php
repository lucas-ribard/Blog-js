<?php

require_once('Post.php');


$db_username = 'root';
$db_password = '';

try {

    $conn = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', $db_username, $db_password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //echo "You are connected to the database";
} catch (PDOException $e) {

    echo "Error : " . $e->getMessage();

}

$error = '';

$sql = "SELECT * FROM categories";
$req = $conn->prepare($sql);
$req->execute();


$result = $req->fetchAll();

/*
var_dump($_SESSION);
echo "<br><br>";
var_dump($_POST);
*/


if (isset($_POST['addBtn'])) {

    if ($_POST['title'] === '' || $_POST['content'] === '' || $_POST['select'] === '') {
        echo 'you have to fill all the inputs';
    } else {
        $newPost->Add($_SESSION['login'], $_POST['title'], $_POST['content'], $_POST['select'], $_SESSION['role']);
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
    <title>Article creation</title>
</head>

<body>

    <?php require_once("Nav/nav.php") ?>
    <div id="Main">
        <h1>Creer votre poste:</h1>

        <form action="articleCreation.php" method="post">

            <input type="text" name="title" id="title" placeholder="Title"><br><br>

            <textarea name="content" id="content" cols="30" rows="10" placeholder="Contenu de l'article"></textarea><br>

            <div id="BottomOption">
                <select name="select" id="select"><br>
                    <option>Pas de catégorie</option>
                    <?php foreach ($result as $key => $value): ?>
                        <option value="<?php echo $value['title']; ?>"><?php echo $value['title']; ?></option>
                    <?php endforeach; ?>
                </select>

                <button id="addBtn" name="addBtn">Add a Post</button>
            </div>
        </form>
    </div>
</body>

</html>