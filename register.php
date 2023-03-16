<?php
require_once('User.php');
// if(isset($_POST['submit-log'])){
//     $newUser->connect($_POST['logName'],$_POST['logPass']);
// }
if (isset($_POST['login']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['password']) && isset($_POST['confirmPassword'])) {
    if ($_POST['password'] === $_POST['confirmPassword']) {
        $error = $newUser->Register($_POST['login'], $_POST['password'], $_POST['email'], $_POST['firstname'], $_POST['lastname']);
    } else {
        $error = "les deux mots de passes ne sont pas identiques";

    }
}

if (isset($_POST['logName']) && isset($_POST['logPass'])) {

    $error = $newUser->Connect($_POST['logName'], $_POST['logPass']);
}

//var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="script/script.js" defer></script>
    <script src="script/register.js" defer></script>
    <title>Blog</title>
</head>

<body>
    <?php require_once("Nav/nav.php") ?>

    <main>
        <div class="form-box">

            <div class="button-box">

                <div id="btn"></div>
                <button type="button" class="toggle-btn" id="login-btn">Login</button>
                <button type="button" class="toggle-btn" id="register-btn">register</button>
            </div>

            <form action="register.php" id="login" class="input-group" method="POST">


                <input type="text" class="input-field" placeholder="User Name" name="logName" required>
                <input type="password" class="input-field" placeholder="Password" name="logPass" required>
                <br><br>
                <div id="error">
                    <?php echo $error; ?>
                </div>
                <br><br>

                <button type="submit" class="submit-btn" id="subLogin" name="submit-log"
                    onclick="PostLogin()">Login</button>

            </form>

            <form action="register.php" id="register" class="input-group" method="POST">

                <input type="text" class="input-field" placeholder="User Name" name="login" required>
                <input type="text" class="input-field" placeholder="First Name" name="firstname" required>
                <input type="text" class="input-field" placeholder="Last Name" name="lastname" required>
                <input type="email" class="input-field" placeholder="Email" name="email" required>
                <input type="password" class="input-field" placeholder="Password" name="password" required>
                <input type="password" class="input-field" placeholder="Confirm Password" name="confirmPassword"
                    required>
                <!-- <input type="file" class="input-field" placeholder="Photo" name="photo" required> -->
                <br><br>
                <div id="error">
                    <?php echo $error; ?>
                </div>
                <br><br>
                <button class="submit-btn" id="subRegister" name="submit-reg" onclick="PostRegister()">Register</button>

            </form>
        </div>
    </main>
</body>

</html>