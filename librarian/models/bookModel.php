<?php

class Book
{
    public $bookID;
    public $ISBN;
    public $name;
    public $author;
    public $page;
    public $amount;
    public $remain;
    public $category;
    public $categoryName;
    public $location;
    public $image_path;

    public function __construct($bookID, $ISBN, $name, $author, $page, $amount, $remain, $category,$categoryName, $location, $image_path)
    {
        $this->bookID = $bookID;
        $this->ISBN = $ISBN;
        $this->name = $name;
        $this->author = $author;
        $this->page = $page;
        $this->amount = $amount;
        $this->remain = $remain;
        $this->category = $category;
        $this->categoryName = $categoryName;
        $this->location = $location;
        $this->image_path = $image_path;
    }

    public function getAll()
    {
        $book_list = [];
        require("connection_connect.php");
        $sql = "select bookID,ISBN,books.name as name,author,page,amount,remain,category,category.name as categoryName, location, image_path from books left join category on books.category = category.categoryID
                order by books.bookID desc";
        $result = mysqli_query($con, $sql);
        while ($my_row = mysqli_fetch_array($result)) {
            $bookID = $my_row["bookID"];
            $ISBN = $my_row["ISBN"];
            $name = $my_row["name"];
            $author = $my_row["author"];
            $page = $my_row["page"];
            $amount = $my_row["amount"];
            $remain = $my_row["remain"];
            $category = $my_row["category"];
            $categoryName = $my_row["categoryName"];
            $location = $my_row["location"];
            $image_path = $my_row["image_path"];
            $book_list[] = new Book($bookID, $ISBN, $name, $author, $page, $amount, $remain, $category, $categoryName,
                $location, $image_path);
        }
        require("connection_close.php");
        return $book_list;
    }

    public function getByISBN($ISBN)
    {
        require("connection_connect.php");
        $sql = "select bookID,ISBN,books.name as name,author,page,amount,remain,category,category.name as categoryName, location, image_path from books left join category on books.category = category.categoryID
                where ISBN = '$ISBN'";
        $result = mysqli_query($con, $sql);
        while ($my_row = mysqli_fetch_array($result))
        {
            $bookID = $my_row["bookID"];
            $ISBN = $my_row["ISBN"];
            $name = $my_row["name"];
            $author = $my_row["author"];
            $page = $my_row["page"];
            $amount = $my_row["amount"];
            $remain = $my_row["remain"];
            $category = $my_row["category"];
            $categoryName = $my_row["categoryName"];
            $location = $my_row["location"];
            $image_path = $my_row["image_path"];
            $book = new Book($bookID, $ISBN, $name, $author, $page, $amount, $remain, $category, $categoryName,
                $location, $image_path);
        }
        require("connection_close.php");
        return $book;
    }

    public static function add($ISBN, $name, $author, $page, $amount, $remain, $category,
                               $location, $image_path)
    {
        require("connection_connect.php");
        $sql = "insert into books (ISBN, name, author, page, amount, remain, category,
                                    location, image_path)
                                    values ('$ISBN', '$name', '$author', '$page', '$amount', 
                                    '$remain', '$category','$location', '$image_path')";
        $result = mysqli_query($con, $sql);
        require("connection_close.php");
        return "add success $result rows";
    }

    public static function delete($ISBN)
    {
        require("connection_connect.php");
        $sql = "Delete from books where ISBN = '$ISBN'";
        $result = mysqli_query($con, $sql) or die(mysqli_query());
        require("connection_close.php");
        return "delete success $result row";
    }

    public static function update($ISBN, $amount)
    {
        require("connection_connect.php");
        $sql = "update books set amount = '$amount' where ISBN = '$ISBN'";
        $result = mysqli_query($con, $sql);
        require("connection_close.php");
        return "update success $result row";
    }

    public static function updateAll($ISBN, $name, $author, $page, $amount, $category, $location)
    {
        require("connection_connect.php");
        $sql = "update books set name = '$name', author = '$author', page = '$page', amount = '$amount', category = '$category', location = '$location'
                where ISBN = '$ISBN'";
        $result = mysqli_query($con, $sql);
        require("connection_close.php");
        return "update success $result row";
    }

    public function borrowBook($ISBN)
    {
        require("connection_connect.php");
        $sql = "select * from books where ISBN = '$ISBN'";
        $result = mysqli_query($con, $sql);
        while ($my_row = mysqli_fetch_array($result)) {
            $remain = $my_row["remain"];
        }
        if ($remain > 0) {
            //substract amount of book from ISBN
            $remain_new = $remain - 1;

            $sql = "update books set remain = '$remain_new' where ISBN = '$ISBN'";
            $result = mysqli_query($con, $sql);
            $complete = "การยืมสำเร็จ";
        } else {
            $complete = "การยืมไม่สำเร็จ เพราะไม่มีจำนวนหนังสือที่เพียงพอ";
        }
        require("connection_close.php");
        return $complete;
    }

    public function returnBook($ISBN)
    {
        require("connection_connect.php");
        $sql = "select * from books where ISBN = '$ISBN'";
        $result = mysqli_query($con, $sql);
        while ($my_row = mysqli_fetch_array($result)) {
            $remain = $my_row["remain"];
            $amount = $my_row["amount"];
        }

        //add amount of book from ISBN
        if ($remain < $amount) {
            $remain_new = $remain + 1;

            $sql = "update books set remain = '$remain_new' where ISBN = '$ISBN'";
            $result = mysqli_query($con, $sql);
            $complete = "การคืนสำเร็จ";
        } else {
            $complete = "ไม่สามารถเพิ่มหนังสือได้มากกว่าจำนวนที่ห้องสมุดควรมี";
        }
        require("connection_close.php");
        return $complete;
    }

    public function getRemain($ISBN)
    {
        require("connection_connect.php");
        $sql = "select * from books where ISBN = '$ISBN'";
        $result = mysqli_query($con, $sql);
        while ($my_row = mysqli_fetch_array($result)) {
            $remain = $my_row["remain"];
        }
        require("connection_close.php");
        return $remain;
    }
}

?>