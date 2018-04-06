<?php

include '../config.php';

include('../API/TaskRepository.php');
include('../API/UserRepository.php');

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
