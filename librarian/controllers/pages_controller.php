<?php

class PagesController

{

    public function home($param = NULL)

    {

        require_once('views/pages/index.php');

    }

    public function error($param = NULL)

    {

        require_once("views/pages/error.php");

    }

    public function login($param = NULL)
    {
        $username = $_POST['uname'];
        $password = $_POST['psw'];
        $user = Librarian::login_hash($username, $password);
        if (is_array($user)) {
            $_SESSION["user"] = $user;
            header('location:index.php?controller=book&action=index');
        }
        else {
            header('location:index.php?controller=pages&action=home');
        }
    }

    public function logout()
    {
        session_destroy();
        session_unset();
        unset($_SESSION['user']);
        //call('identify', 'index');
        header('location:index.php?controller=pages&action=home');
    }
}

?>