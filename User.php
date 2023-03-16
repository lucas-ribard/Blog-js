<?php
ini_set('display_errors',1); 
error_reporting(E_ALL);
session_start();

class User
{
    private $id;
    public $login;
    public $email;
    public $firstname;
    public $lastname;
    public $photo;
    public $password;
    public $role;
    private $conn;

    public function __construct()
    {

        $db_username = 'root';
        $db_password = '';

        try {

            $this->conn = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', $db_username, $db_password);

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo "You are connected to the database <br>";
        } catch (PDOException $e) {

            echo "Error : " . $e->getMessage() . "<br>";

        }

    }

    public function Register($login, $password, $email, $firstname, $lastname)
    {

        $error = "";

        $sql = "SELECT * FROM users WHERE login=:login";

        $req = $this->conn->prepare($sql);
        $req->execute(array(':login' => $login));
        $row = $req->rowCount();
        echo 'rowcount' . $row . "<br>";
        if ($row <= 0) {

            if(strlen($login) >= 4 && !preg_match("[\W]", $login) && strlen($password) >= 5 && preg_match("/@/", $email) && preg_match("/\./", $email) && strlen($firstname) >= 2 && !preg_match("[\W]", $firstname) && strlen($lastname) >= 2 && !preg_match("[\W]", $lastname)) {
                

                $hash = password_hash($password, PASSWORD_DEFAULT);

                $hash = password_hash($password, PASSWORD_DEFAULT);

               
                $sql = "INSERT INTO `users` (`login`, `password`, `email`, `firstname`, `lastname`,`role`) VALUES (:login, :password, :email, :firstname, :lastname, :role)";
                
                $req = $this->conn->prepare($sql);
               
                $req->execute(
                    array(
                        ':login' => $login,
                        ':password' => $hash,
                        ':email' => $email,
                        ':firstname' => $firstname,
                        ':lastname' => $lastname,
                        ':role' => "subscriber"
                    )
                );

                

                
                echo 'exec'."<br>";
                echo '<strong>Success!</strong> Your account is now created and you can login <br>';

                $userData = [
                    'login' => $login,
                    'password' => $hash,
                    'email' => $email,
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                ];

                return $userData;


            } else {

                if (strlen($login) < 4 || preg_match("[\W]", $login)) {

                    $error = "Your login must contain at least 4 caracters and no specials caracters";

                }

                if (strlen($password) < 5) {

                    $error = "Your password must contain at least 5 caracters";

                }

                if (!preg_match("/@/", $email) || !preg_match("/\./", $email)) {

                    $error = "Your email is not valid. It must contain '@' and '.'";

                }

                if (strlen($firstname) < 2 || preg_match("[\W]", $firstname) || strlen($lastname) < 2 || preg_match("[\W]", $lastname)) {

                    $error = "Your first and last names must contain at least 2 caracters and no specials caracters";

                }

            }

        } else {
            $error = '<strong>Error!</strong> The login already exist. Please choose another one';
        }
        echo '<strong>Success!</strong> Your account is now created and you can login <br>';
        return $error;

    }

    public function Connect($login, $password)
    {

        $sql = "SELECT * FROM users WHERE login=:login";

        $req = $this->conn->prepare($sql);
        $req->execute(array(':login' => $login));
        $row = $req->rowCount();

        if ($row == 1) {

            $tab = $req->fetch(PDO::FETCH_ASSOC);
            $dataPass = $tab['password'];
            $id = $tab['id'];

            if (password_verify($password, $dataPass)) {

                $_SESSION['id'] = "$id";
                $_SESSION['login'] = $login;
                $_SESSION['password'] = $dataPass;
                $_SESSION['email'] = $tab['email'];
                $_SESSION['firstname'] = $tab['firstname'];
                $_SESSION['lastname'] = $tab['lastname'];
                header("location: Articles.php");

            } else {
                echo '<strong>Error!</strong> Wrong password<br>';
            }
        } else {
            echo '<strong>Error!</strong> The login do not exist. You don\'t have an account? <a href=\"inscription.php\">Signup</a><br>';
        }

    }

    public function Disconnect()
    {

        session_destroy();
        exit('Vous avez bien été deconnecté');

    }

    public function Delete()
    {

        if ($_SESSION || $_SESSION['role'] === 'admin') {

            $sessionId = $_SESSION['id'];

            $sql = "DELETE FROM `users` WHERE id = :sessionId";

            $req = $this->conn->prepare($sql);
            $req->execute(array(':sessionId' => $sessionId));

            session_destroy();
            exit('You have deleted your account');


        } else {
            echo 'Please login to delete your account<br>';
        }

    }

    public function Update($login, $password, $passwordNew, $passwordNewConfirm, $email, $firstname, $lastname)
    {

        $error = "";

        if ($_SESSION) {

            $sessionId = $_SESSION['id'];
            $passwordTrue = $_SESSION['password'];

            $sql = "SELECT * FROM users WHERE id = :sessionId";
            $req = $this->conn->prepare($sql);
            $req->execute(array(':sessionId' => $sessionId));
            $row = $req->rowCount();

            if (password_verify($password, $passwordTrue)) {

                if ($_SESSION['login'] != $login && strlen($login) >= 4 && !preg_match("[\W]", $login)) {

                    if ($row != 1) {

                        echo '<strong>Error!</strong> The login already exist';

                    } else {

                        $sqlLog = "UPDATE users SET login = :login WHERE id = :sessionId";

                        // Check if the username is already present or not in our Database.
                        $req = $this->conn->prepare($sqlLog);
                        $req->execute(array(':login' => $login, ':sessionId' => $sessionId));

                        $_SESSION['login'] = $login;
                        echo '<strong>Success!</strong> Your login has been edited<br>';

                    }

                } elseif (strlen($login) < 4 || preg_match("[\W]", $login)) {

                    $errorLogin = "Your login must contain at least 4 caracters and no specials caracters <br>";

                }

                if (!empty($passwordNew) && !empty($passwordNewConfirm && $passwordNew == $passwordNewConfirm && strlen($passwordNew) >= 5)) {

                    $hash = password_hash($passwordNew, PASSWORD_DEFAULT);

                    $sqlPass = "UPDATE users SET password = '$hash' WHERE id = '$sessionId'";
                    $rs = $this->conn->query($sqlPass);

                    $_SESSION['password'] = $hash;
                    echo '<strong>Success!</strong> Your password has been edited<br>';

                } elseif (strlen($passwordNew) < 5 and !empty($passwordNew)) {

                    $errorPassword = "Your password must contain at least 5 caracters";

                } elseif (!empty($passwordNew) && empty($passwordNewConfirm)) {

                    $errorPassword = "<strong>Error!</strong> Please confirm password";

                } elseif (($passwordNew != $passwordNewConfirm)) {

                    $errorPassword = "<strong>Error!</strong> The passwords are differents";

                }

                if ($_SESSION['email'] != $email && preg_match("/@/", $email) && preg_match("/\./", $email)) {

                    $sqlMail = "UPDATE users SET email = '$email' WHERE id = '$sessionId'";
                    $rs = $this->conn->query($sqlMail);
                    $_SESSION['email'] = $email;
                    echo '<strong>Success!</strong> Your email has been edited<br>';

                } elseif (!preg_match("/@/", $email) || !preg_match("/\./", $email)) {

                    $errorEmail = "Your email is not valid. It must contain '@' and '.' <br>";

                }

                if ($_SESSION['firstname'] != $firstname && strlen($firstname) >= 2 && !preg_match("[\W]", $firstname)) {

                    $sqlFirstN = "UPDATE users SET firstname = '$firstname' WHERE id = '$sessionId'";
                    $rs = $this->conn->query($sqlFirstN);
                    $_SESSION['firstname'] = $firstname;
                    echo '<strong>Success!</strong> Your first name has been edited';

                } elseif (strlen($firstname) < 2 || preg_match("[\W]", $firstname)) {

                    $errorFirstName = "Your first name must contain at least 2 caracters and no specials caracters";

                }

                if ($_SESSION['lastname'] != $lastname && strlen($lastname) >= 2 && !preg_match("[\W]", $lastname)) {

                    $sqlLastN = "UPDATE users SET lastname = '$lastname' WHERE id = '$sessionId'";
                    $rs = $this->conn->query($sqlLastN);
                    $_SESSION['lastname'] = $lastname;
                    echo '<strong>Success!</strong> Your last name has been edited';

                } elseif (strlen($lastname) < 2 || preg_match("[\W]", $lastname)) {

                    $errorLastName = "Your last name must contain at least 2 caracters and no specials caracters";

                }


            } else {
                $error = '<strong>Error!</strong> Wrong password';
            }

        } else {
            $error = '<strong>Error!</strong> Please login to change your infos <br>';
        }

        return $error;

    }

    public function IsConnected()
    {

        if ($_SESSION) {
            return true;
        } else {
            return false;
        }

    }

    public function GetAllInfos()
    {

        if ($_SESSION) {
            return $_SESSION;
        } else {
            echo 'Please login to view your infos<br>';
        }

    }

    public function GetLogin()
    {

        if ($_SESSION) {
            return $_SESSION['login'];
        } else {
            echo 'Please login to view your login<br>';
        }

    }

    public function GetEmail()
    {

        if ($_SESSION) {
            return $_SESSION['email'];
        } else {
            echo 'Please login to view your email<br>';
        }

    }

    public function GetFirstname()
    {

        if ($_SESSION) {
            return $_SESSION['firstname'];
        } else {
            echo 'Please login to view your first name<br>';
        }

    }

    public function GetLastname()
    {

        if ($_SESSION) {
            return $_SESSION['lastname'];
        } else {
            echo 'Please login to view your last name<br>';
        }

    }

}

$newUser = new User();

?>