<?php
require_once('User.php');

if (isset($_POST['login'])) {
    if ($_POST['newPassword'] === $_POST['newPasswordConf']) {
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
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="update.js" defer></script>
    <title>Update</title>
</head>

<body>

    <?php require_once("Nav/nav.php") ?>

    <div id="main">
        <div id="fullForm">
            <div id="updateTop">
                <h1 id="UpdateTitle">You can update your profile here:</h1>
            </div>
            <div id="form-box-update">
                <form action="update.php" id="updateForm" method="POST" id="update">

                    <input type="text" class="input-field" name="login" id="login" placeholder="Login" class="inputs">
                    <input type="text" class="input-field" name="firstname" id="firstname" placeholder="First Name"
                        class="inputs">
                    <input type="text" class="input-field" name="lastname" id="lasstname" placeholder="Last Name"
                        class="inputs">
                    <input type="email" class="input-field" name="email" id="email" placeholder="Email" class="inputs">
                    <input type="password" class="input-field" name="oldPassword" id="oldPassword"
                        placeholder="Old Password" class="inputs">
                    <input type="password" class="input-field" name="newPassword" id="newPassword"
                        placeholder="New Password" class="inputs">
                    <input type="password" class="input-field" name="newPasswordConf" id="newPasswordConf"
                        placeholder="Confirm New Password" class="inputs">
                    <!-- <input type="file" name="photo" id="photo" placeholder="Photo" class="inputs"> -->
                    <br><button type="submit" name="update" id="subUpdate">Update</button>

                </form>
            </div>
        </div>
    </div>
</body>

</html>