<?php

class Category
{
    public $categoryID;
    public $name;

    public function __construct($categoryID,$name)
    {
        $this->categoryID = $categoryID;
        $this->name = $name;
    }

    public function getAll()
    {
        $category_list = [];
        require("connection_connect.php");
        $sql = "select * from category";
        $result = mysqli_query($con, $sql);
        while ($my_row = mysqli_fetch_array($result)) {
            $categoryID = $my_row["categoryID"];
            $name = $my_row["name"];
            $category_list[] = new Category($categoryID, $name);
        }
        require("connection_close.php");
        return $category_list;
    }
}
?>