<?php

class BookController
{
    //index page
    public function index()
    {
        require_once('views/pages/index.php');
    }

    //page for add,delete,update book
    public function managePage()
    {
        $books = Book::getAll();
        require_once('views/book/bookList.php');
    }

    public function addPage()
    {
        $category = Category::getAll();
        require_once('views/book/bookAdd.php');
    }
    //add book data to mySQL database
    public function add_book()
    {

        $ISBN = $_POST["ISBN"];
        $name = $_POST["name"];
        $author = $_POST["author"];
        $page = $_POST["page"];
        $amount = $_POST["amount"];
        $remain = $amount;
        $category = $_POST["category"];
        $location = $category . "00-" . $_POST["location"];

        $target_dir = "images/bookImg/";
        $image_path = $ISBN.'_'. basename($_FILES["fileToUpload"]["name"]);
//        $image_path = basename($_FILES["fileToUpload"]["name"]);
        $target_file = $target_dir . $image_path;

        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                //echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                //echo "File is not an image.";
                echo "<script language=\"javascript\">alert('File is not an image.')</script>";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "<script language=\"javascript\">alert('Sorry, file already exists.')</script>";
            $uploadOk = 0;
        }
        // Check file size 3000kb
        if ($_FILES["fileToUpload"]["size"] > 3000000) {
            //echo "Sorry, your file is too large.";
            echo "<script language=\"javascript\">alert('Sorry, your file is too large.')</script>";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            echo "<script language=\"javascript\">alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            //echo "Sorry, your file was not uploaded.";
            echo "<script language=\"javascript\">alert('เพิ่มข้อมูลหนังสือเข้าสู่ระบบล้มเหลว')</script>";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "<script language=\"javascript\">alert('เพิ่มข้อมูลหนังสือเข้าสู่ระบบสำเร็จ')</script>";
                //echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                $add = Book::add($ISBN, $name, $author, $page, $amount, $remain, $category,$location, $image_path);
            } else {
                //echo "Sorry, there was an error uploading your file.";
            }
        }

        BookController::addPage();
    }

    //delete book data from mySQL database
    public function delete_book()
    {
        $ISBN = $_REQUEST["ISBN"];

        $delete = Book::delete($ISBN);

        bookController::managePage();
    }

    public function editPage()
    {
        //echo "<script language='javascript'>alert('Test')</script>";
        $ISBN = $_GET["ISBN"];
        $book = Book::getByISBN($ISBN);
        $category = Category::getAll();
        
        require_once('views/book/bookEdit.php');
    }

    public function edit_book()
    {
        $ISBN = $_POST["ISBN"];
        $name = $_POST["name"];
        $author = $_POST["author"];
        $page = $_POST["page"];
        $amount = $_POST["amount"];
        $category = $_POST["category"];
        $location = $category . "00-" . $_POST["location"];
        $edit = Book::updateAll($ISBN, $name, $author, $page, $amount, $category, $location);

        BookController::managePage();

    }

    //page for managing (borrow or return) book
    public function bookStatusPage()
    {
        $ISBN = $_POST["ISBN"];
        $book = Book::getByISBN($ISBN);
        require('views/book/bookStatus.php');
    }

    //borrow book using ISBN
    public function borrow_book()
    {
        $ISBN = $_GET["ISBN"];
        $result = Book::borrowBook($ISBN);
        echo "<script language='javascript'>alert('$result')</script>";
        $_POST["ISBN"] = $ISBN;
        BookController::bookStatusPage();
    }

    //return book using ISBN
    public function return_book()
    {
        $ISBN = $_GET["ISBN"];
        $result = Book::returnBook($ISBN);
        echo "<script language='javascript'>alert('$result')</script>";
        $_POST["ISBN"] = $ISBN;
        BookController::bookStatusPage();
    }
}

?>