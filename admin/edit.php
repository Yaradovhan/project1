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

$init = new AdminEdit();

$res = $init->execute($_POST['task']);

?>
<a href="javascript:history.go(-1)">Congrats, go back to dashboard</a>
