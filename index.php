<?php

include 'config.php';
header("Content-Type:text/html;charset='utf8_general_ci'");

function __autoload($file)
{
    if (file_exists('controller/' . $file . '.php')) {
        require_once 'controller/' . $file . '.php';
    } else {
        require_once 'model/' . $file . '.php';
    }
}

if (isset($_GET['option'])) {
    $class = strip_tags($_GET['option']);
    switch ($class) {

        case 'add':
            $init = new Add();
            break;

        case 'delete/{id}':
            $init = new Delete();
            break;

        case 'done/{id}':
            $init = new Done();
            break;

        default :
            $init = new Index();
            break;
    }
} else {
    if(isset($_SESSION['auth']))
    {

    }
    $init = new Index();
}
//print_r($_GET['option']);
//die();
echo $init->get_body();