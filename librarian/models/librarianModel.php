<?php

class Librarian

{

    public $librarianID;
    public $name;
    public $surname;
    public $userName;
    public $password;

    public function __construct($librarianID, $name, $surname, $userName, $password)
    {
        $this->librarianID = $librarianID;
        $this->name = $name;
        $this->surname = $surname;
        $this->userName = $userName;
        $this->password = $password;
    }

    public static function login($userName, $password)
    {
        require("connection_connect.php");
        $sql = "select * from librarian where userName = '$userName' and password = '$password'";
        $result = mysqli_query($con, $sql);
        while ($my_row = mysqli_fetch_array($result)) {
            $librarianID = $my_row["librarianID"];
            $name = $my_row["name"];
            $surname = $my_row["surname"];
            $userName = $my_row["userName"];
            $password = $my_row["password"];
            $user = new Librarian($librarianID, $name, $surname, $userName, $password);
        }
        require("connection_close.php");
        return $user;
    }

    //in case of using hash password
    public static function login_hash($userName, $password)
    {
        require_once('connection_connect.php');
        $sql = "SELECT * FROM librarian WHERE userName = '$userName'";
        echo $sql;
        $result = mysqli_query($con, $sql);
        $result = mysqli_fetch_array($result);
        if ($result) {
            $password_hash = $result['password'];
            $check_password = password_verify($password, $password_hash);
            if ($check_password === TRUE) {
                return $result;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    public static function addLibrarian($name, $surname, $userName, $password)
    {
        require("connection_connect.php");
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO librarian (name, surname, userName, password)
            VALUES('$name','$surname','$userName','$password')";
        mysqli_query($con, $sql);
        require("connection_close.php");
    }

}

?>