<?php
    session_start();
    $db_username = 'root';
    $db_password = '';

    try{

        $conn = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', $db_username, $db_password);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // echo "You are connected to the database";
    }

    catch(PDOException $e){

        echo "Error : " . $e->getMessage();

    }

    $error = '';

    $title = $_POST['catTitle'];
    $content = $_POST['catContent'];

    $sql = "SELECT * FROM categories WHERE title=:title";   
    $req = $conn->prepare($sql);
    $req->execute(array(':title' => $title));
    $row = $req->rowCount();

    if($row <= 0){

        if(isset($_POST['add'])){

            $title = $_POST['catTitle'];
            $content = $_POST['catContent'];

            $sql = "INSERT INTO `categories` (`title`, `content`, `slug`) VALUES (:title, :content, :slug)";
            $req = $conn->prepare($sql);
            $req->execute(array(':title' => $title,
                                ':slug' => '?',
                                ':content' => $content));
        }

    }else{
        $error = 'The category already exists';
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Category creation</title>
</head>
<body>
    
    <form action="categoryCreation" method="POST">

        <input type="text" name="catTitle" id="catTitle" placeholder="Category Title">
        <input type="text" name="catContent" id="catContent" placeholder="category Summary">
        <button name="add" class="addCategory" >Add category</button>
    </form>

</body>
</html>