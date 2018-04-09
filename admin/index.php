<?php
session_start();
include '../config.php';

//include('../model/TaskRepository/TaskRepository.php');
//include('../model/UserRepository/UserRepository.php');

function __autoload($file)
{
    if (file_exists('../controller/' . $file . '.php')) {
        require_once '../controller/' . $file . '.php';
    } elseif (file_exists('../model/' . $file . '.php')) {
        require_once '../model/' . $file . '.php';
    } elseif (file_exists('../model/TaskRepository/' . $file . '.php')) {
        require_once '../model/TaskRepository/' . $file . '.php';
    } elseif (file_exists('../model/UserRepository/' . $file . '.php')) {
        require_once '../model/UserRepository/' . $file . '.php';
    } elseif (file_exists('../model/UserRepository/' . $file . '.php')) {
        require_once '../model/UserRepository/' . $file . '.php';
    } elseif (file_exists('../API/' . $file . '.php')) {
        require_once '../API/' . $file . '.php';
    }
}

?>

<?php

$limit = ConfigApp::MysqlLimit;

if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}

$start = ($page - 1) * $limit;
$init = new AdminIndex();

echo $init->execute($start, $limit);

