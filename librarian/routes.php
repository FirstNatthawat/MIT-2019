<?php

$controllers = array('pages' => ['home', 'error','login','logout'],
    'book' => ['index','managePage','addPage','add_book','delete_book','editPage','edit_book','bookStatusPage','borrow_book','return_book'],
    'librarian' => ['addPage', 'add']
);
function call($controller, $action)
{
    require_once("controllers/" . $controller . "_controller.php");
    $param = array();
    switch ($controller) {
        case "pages":
            require_once("models/librarianModel.php");
            $controller = new PagesController();
            break;
        case "book":
            require_once("models/bookModel.php");
            require_once("models/categoryModel.php");
            $controller = new BookController();
            break;
        case "librarian":
            require_once("models/librarianModel.php");
            $controller = new LibrarianController();
            break;
    }

    $controller->{$action}($param);

}

if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
        call($controller, $action);
    } else {
        call('pages', 'error');
    }
} else {
    call('pages', 'error');
}

?>