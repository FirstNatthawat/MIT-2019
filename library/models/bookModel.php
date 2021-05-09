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
}

?>