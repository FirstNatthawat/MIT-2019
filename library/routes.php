<?php

$controllers = array('book' => ['index']
);
function call($controller, $action)
{
    require_once("controllers/" . $controller . "_controller.php");
    $param = array();
    switch ($controller) {
        case "book":
            require_once("models/bookModel.php");
            $controller = new BookController();
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