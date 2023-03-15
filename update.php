<?php
    require_once('User.php');
    
    if(isset($_POST['login'])){
        if($_POST['newPassword'] === $_POST['newPasswordConf']){
            $newUser->Update($_POST['login'], $_POST['oldPassword'], $_POST['newPassword'], $_POST['newPasswordConf'], $_POST['email'], $_POST['firstname'], $_POST['lastname']);
        } 
    }

    // var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="script/update.js" defer></script>
    <title>Update</title>
</head>
<body>
    
    <header>
        <nav>

            <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
                <i class="fa-solid fa-bars"></i>
            </label>

            <label class="logo">Blog</label>
            <ul>
                <li><a class="active" href="./index.php">Home</a></li>
                <li><a href="./register.php">Login</a></li>
                <li><a href="./toDoList.php">Articles</a></li>
                <li><a href="./disconnect.php">Disconnect</a></li>
                <li><a href="./contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>You can update your profile here:</h1>
        <form action="update.php" method="POST" id="update">
            <input type="text" name="login" id="login" placeholder="Login" class="inputs">
            <input type="text" name="firstname" id="firstname" placeholder="First Name" class="inputs">
            <input type="text" name="lastname" id="lasstname" placeholder="Last Name" class="inputs">
            <input type="email" name="email" id="email" placeholder="Email" class="inputs">
            <input type="password" name="oldPassword" id="oldPassword" placeholder="Old Password" class="inputs">
            <input type="password" name="newPassword" id="newPassword" placeholder="New Password" class="inputs">
            <input type="password" name="newPasswordConf" id="newPasswordConf" placeholder="Confirm New Password" class="inputs">
            <!-- <input type="file" name="photo" id="photo" placeholder="Photo" class="inputs"> -->
            <button type="submit" name="update" id="subUpdate">Update</button>

        </form>
    </main>
</body>
</html>
