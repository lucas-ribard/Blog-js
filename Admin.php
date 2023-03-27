<?php
require_once('User.php');
//redirige la page si l'user n'est pas admin
if (!isset($_SESSION['role']) || $_SESSION['role'] != "admin") {
    header("location:./index.php");
}

$result = $newUser->GetAllUserInfo();
//Update($login, $password, $passwordNew, $passwordNewConfirm, $email, $firstname, $lastname)
//$result=$result[0];

function AfficherUser($value)
{
    echo '<form action="Admin.php" id="updateForm" method="POST" id="update">';

    echo '<div class="Box">';
    
    echo '<div class="UserBox">Utilisateur : <input type="text" name="login" id="login" value='.$value['login'].'></input>';
    echo '<input type="text" name="firstname" id="firstname" value='.$value['firstname'].'></input>';
    echo '<input type="text" name="lastname" id="lastname" value='.$value['lastname'].'></input>';
    echo '<input type="text" name="lastname" id="lastname" value='.$value['password'].' hidden></input>';       
    
    echo '<select name="select" id="select"><br><option>'.$value['role'].'</option>';
    if ($value['role'] != 'subscriber'){echo '<option value="subscriber">subscriber</option>';};
    if ($value['role'] != 'moderator'){echo '<option value="moderator">moderator</option>';};
    if ($value['role'] != 'admin'){echo '<option value="admin">admin</option>';};
    echo "</select>";

    echo '<button type="submit">Enregistrer</button><button>Supprimer</button>';
    echo "</div>";

}
;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panneaux d'administration</title>
</head>

<body>

    <?php
    require_once("Nav/nav.php");

    foreach ($result as $key => $value):
        AfficherUser($value);
    endforeach;

    ?>

</body>

</html>