<?php

include 'config.php';

include('./model/TaskModel/TaskModel.php');
include('./model/UserModel/UserModel.php');

function __autoload($file)
{
    if (file_exists('controller/' . $file . '.php')) {
        require_once 'controller/' . $file . '.php';
    } else {
        require_once 'model/' . $file . '.php';
    }
}

if(isset($_GET['add']))
{
    $init = new Add();
} else {
    $init = new Index();
}

echo $init->execute();
