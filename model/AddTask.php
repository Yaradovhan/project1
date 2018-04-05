<?php

//Include Task Repository
include('./../API/TaskRepository.php');
include('./../API/UserRepository.php');
include 'ConnectionMySql.php';

$r = 1;

if (isset($_POST['user']) && isset($_POST['task'])) {

    /**
     * add image script
     * ---------------
     */

    $_POST['task']['img'] = IMAGE;

//    /** @var Task $task */
//    $task = new Task();
//    $task->setTask($_POST['task']);

//    $task->set
    /** @var User $user */
//    $userName = null;
//
//    if(isset($_SESSION['user_id']))
//    {
//        $userId = $_SESSION['user_id'];
//    } else
//    {
//        $userId = ;
//    }
//
//    if($userId) {
    $userRepo = new UserRepository();
    $taskRepo = new TaskRepository();

//        $arrayUser = ['id' => $userId, 'name' => $_POST['user']['name'], 'email' => $_POST['user']['email']];
    $arrayUser = ['name' => $_POST['user']['name'], 'email' => $_POST['user']['email']];
    $arrayTask = ['text' => $_POST['task']['text'], 'img' => $_POST['task']['img']];
//        print_r($arrayUser);
//        print_r($arrayTask);
//        die();
    $user = new User();
    $user->setUser($arrayUser);
    $task = new Task();
    $task->setTask($arrayTask);
//        $currentUser = $userRepo->getById($userId);
//        $user = new User();
//        $user->setId();

    $taskRepo->save($task, $user);
    $userRepo->save($task, $user);

}