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

$init = null;
if(isset($_GET['add']))
{
//    $init = new Add();
}else
{
    $init = new AdminIndex();
}

//$taskRepository = new TaskRepository();
//
//$allTasks = $taskRepository->getAll();
//$getAllByName = $taskRepository->getAllByName();
//$getAllByEmail = $taskRepository->getAllByEmail();
////$deleteById = $taskRepository->deleteById($_GET['id']);
//$save = $taskRepository->save();
//echo "<pre>";
//print_r($allTasks);

echo $init->get_body();

