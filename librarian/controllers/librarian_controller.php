<?php

class LibrarianController
{
    public function addPage()
    {
        require_once('views/librarian/librarianAdd.php');
    }

    public function add()
    {
        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $username = $_POST["username"];
        $password = $_POST["password"];

        Librarian::addLibrarian($name, $surname, $username, $password);

        require_once('views/pages/index.php');
    }
}

?>