<?php

include 'config.php';

include('./API/TaskRepository.php');
include('./API/UserRepository.php');

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
}else
{
    $init = new Index();
}

$limit = 3;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$start = ($page-1) * $limit;

echo $init->get_body($start, $limit);
