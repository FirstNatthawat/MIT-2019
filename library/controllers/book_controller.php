<?php

class BookController
{
    //index page
    public function index()
    {
        $books = Book::getAll();
        require_once('views/book/bookList.php');
    }
}

?>