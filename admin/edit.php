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
//
//var_dump($_POST);
//exit;
$init = new AdminEdit();
//exit;
$res = $init->execute($_POST['task']);

var_dump($res);
//Reditect back
?>

<a src="getBack to index admin">Congrats, go back to dashboard</a>
//exit;