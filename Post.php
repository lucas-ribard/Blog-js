<?php

session_start();

class Post
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

            // echo "You are connected to the database";
        } catch (PDOException $e) {

            //echo "Error : " . $e->getMessage();

        }

    }

    public function Add($userId, $title, $content, $category, $userRole)
    {

        if ($userRole === 'admin' || $userRole === 'moderator') {

            $creationDate = date_default_timezone_set("Europe/Paris");
            $creationDate = date("Y-m-d H:i:s");

            $sql = "INSERT INTO `posts` (`userid`, `title`, `createdat`,`content`, `categoryid`) VALUES (:userid, :title, :createdat, :content, :categoryid)";
            $req = $this->conn->prepare($sql);
            $req->execute(
                array(
                    ':userid' => $userId,
                    ':title' => $title,
                    ':createdat' => $creationDate,
                    ':content' => $content,
                    ':categoryid' => $category
                )
            );

        } else {
            $error = 'You do not have the right to post';
        }

    }
    
    public function GetAllPosts()
    {
        $sql = "SELECT * FROM `posts` ORDER BY `createdat` DESC";
        $req = $this-> conn->prepare($sql);
        $req->execute();
        $result = $req->fetchAll();
        return $result;
    }

    public function GetLastThreePost()
    {
        $sql = "SELECT * FROM `posts` ORDER BY `createdat` DESC LIMIT 3 ";
        $req = $this-> conn->prepare($sql);
        $req->execute();
        $result = $req->fetchAll();
        return $result;
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

    public function CreerCategorie()
    {
        $error = '';

        $title = $_POST['catTitle'];
        $content = $_POST['catContent'];

        $sql = "SELECT * FROM categories WHERE title=:title";
        $req = $this->conn->prepare($sql);
        $req->execute(array(':title' => $title));
        $row = $req->rowCount();

        if ($row <= 0) {

            if (isset($_POST['add'])) {

                $title = $_POST['catTitle'];
                $content = $_POST['catContent'];

                $sql = "INSERT INTO `categories` (`title`, `content`, `slug`) VALUES (:title, :content, :slug)";
                $req = $this->conn->prepare($sql);
                $req->execute(
                    array(
                        ':title' => $title,
                        ':slug' => '?',
                        ':content' => $content
                    )
                );
            }

        } else {
            $error = 'The category already exists';
        }




    }


}



$newPost = new Post();

?>