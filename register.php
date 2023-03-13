<?php
    require_once('User.php');
    // if(isset($_POST['submit-log'])){
    //     $newUser->connect($_POST['logName'],$_POST['logPass']);
    // }
    if(isset($_POST['login']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['password']) && isset($_POST['confirmPassword']) ){
        if($_POST['password'] === $_POST['confirmPassword']){
            $newUser->Register($_POST['login'], $_POST['password'], $_POST['email'], $_POST['firstname'], $_POST['lastname']);
        } 
    }

    if(isset($_POST['logName']) && isset($_POST['logPass'])){

    $newUser->Connect($_POST['logName'], $_POST['logPass']);
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
    <script src="script.js" defer></script>
    <script src="register.js" defer></script>
    <title>Blog</title>
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
                <li><a href="./Articles.php">Articles</a></li>
                <li><a href="./disconnect.php">Disconnect</a></li>
            </ul>
        </nav>
    </header>
    <main>
    <div class="form-box">

        <div class="button-box">

            <div id="btn"></div>
            <button type="button" class="toggle-btn" id="login-btn">Login</button>
            <button type="button" class="toggle-btn" id="register-btn">register</button>
        </div>

        <form action="register.php" id="login" class="input-group" method="POST">

            <div class="error">
                <p></p>
            </div>
            <input type="text" class="input-field" placeholder="User Name" name="logName" required>
            <input type="password" class="input-field" placeholder="Password" name="logPass" required>
            <input type="checkbox" class="check-box"><span>Remember Password</span>
            <button type="submit" class="submit-btn" id="subLogin" name="submit-log">Login</button>

        </form>

        <form action="register.php" id="register" class="input-group" method="POST">

            <input type="text" class="input-field" placeholder="User Name" name="login" required>
            <input type="text" class="input-field" placeholder="First Name" name="firstname" required>
            <input type="text" class="input-field" placeholder="Last Name" name="lastname" required>
            <input type="email" class="input-field" placeholder="Email" name="email" required>
            <input type="password" class="input-field" placeholder="Password" name="password" required>
            <input type="password" class="input-field" placeholder="Confirm Password" name="confirmPassword" required>
            <!-- <input type="file" class="input-field" placeholder="Photo" name="photo" required> -->
            <input type="checkbox" class="check-box"><span>I agree to the terms & conditions</span>
            <button type="submit" class="submit-btn" id="subRegister" name="submit-reg">Register</button>

        </form>
    </div>
</main>
</body>
</html>
