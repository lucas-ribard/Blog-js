<?php

    require_once('Post.php');


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

    $sql = "SELECT * FROM categories";   
    $req = $conn->prepare($sql);
    $req->execute();

   
    $result = $req->fetchAll();
    
    

    var_dump($_SESSION);
    var_dump($_POST);



    if(isset($_POST['addBtn'])){

        if ($_POST['title'] === '' || $_POST['content'] === '' || $_POST['select'] === ''){
            echo 'you have to fill all the inputs';
        }else{
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
    <link rel="stylesheet" href="style.css">
    <title>Article creation</title>
</head>
<body>
    <h1>Add a post here:</h1>

    <form action="articleCreation.php" method="post">

        <input type="text" name="title" id="title" placeholder="title">
        <textarea name="content" id="content" cols="30" rows="10"></textarea>
        <select name="select" id="select">
            <option >Select a category</option>
            <?php foreach ($result as $key => $value): ?>
                <option value="<?php echo $value['title'];?>"><?php echo $value['title'];?></option>
                <?php endforeach;?>
        </select>
        <button name="addBtn">Add a Post</button>

    </form>
</body>
</html>