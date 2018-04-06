<?php

require_once '../config.php';
require_once '../API/UserRepository.php';
require_once '../API/TaskRepository.php';
require_once 'User.php';
require_once 'Task.php';
require_once 'ConnectionMySql.php';

if(isset($_FILES['img'])){
    $errors= array();
    $file_name = $_FILES['img']['name'];
    $file_size =$_FILES['img']['size'];
    $file_tmp =$_FILES['img']['tmp_name'];
    $file_type=$_FILES['img']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['img']['name'])));

    $expensions= array("jpeg","jpg","png");

    if(in_array($file_ext,$expensions)=== false){
        $errors[]="extension not allowed, please choose a JPEG or JPG or PNG file.";
    }

    if($file_size > 2097152){
        $errors[]='File size must be excately 2 MB';
    }

    if(empty($errors)==true){
        move_uploaded_file($file_tmp,IMAGE.$file_name);
        echo "Success";
    }else{
        print_r($errors);
    }
}

if (isset($_POST['user']) && isset($_POST['task'])) {
//    $_POST['task']['img'] = IMAGE;
    $userRepo = new UserRepository();
    $taskRepo = new TaskRepository();
    $arrayUser = ['name' => $_POST['user']['name'], 'email' => $_POST['user']['email']];
    $arrayTask = ['text' => $_POST['task']['text'], 'img' => $file_name];
    $user = new User();
    $user->setUser($arrayUser);
    $task = new Task();
    $task->setTask($arrayTask);
    $taskRepo->save($task, $user);
    $userRepo->save($task, $user);
}
?>
<a href="javascript:history .go(-1)">Task added <br> go back to dashboard</a>
