﻿<?php
include '../config.php';

include('../model/TaskModel/TaskModel.php');
include('../model/UserModel/UserModel.php');

function __autoload($file)
{
    if (file_exists('../controller/' . $file . '.php')) {
        require_once '../controller/' . $file . '.php';
    } else {
        require_once '../model/' . $file . '.php';
    }
}

?>

<?php
//session_destroy();


$limit = ConfigApp::MysqlDescSort;

if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}

$start = ($page - 1) * $limit;
$init = new AdminIndex();

echo $init->execute($start, $limit);

