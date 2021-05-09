<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
?>
<?php include('views/header/header.php'); ?>
<body>
<?php
session_start();

if (isset($_REQUEST['controller']) && isset($_REQUEST['action'])) {

    $controller = $_REQUEST['controller'];
    $action = $_REQUEST['action'];

} else {
    header("location: ?controller=book&action=index");
}
require_once("routes.php");
?>
</body>
</html>




