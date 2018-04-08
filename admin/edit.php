<?php

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

$init = new AdminEdit(new TaskRepository());

$res = $init->execute($_POST['task']);