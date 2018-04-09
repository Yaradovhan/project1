<?php
include '../config.php';
function __autoload($file)
{
    if (file_exists('../controller/' . $file . '.php')) {
        require_once '../controller/' . $file . '.php';
    } elseif (file_exists('../model/' . $file . '.php')) {
        require_once '../model/' . $file . '.php';
    } elseif (file_exists('../model/TaskRepository/' . $file . '.php')) {
        require_once '../model/TaskRepository/' . $file . '.php';
    } elseif (file_exists('../model/UserRepository/' . $file . '.php')) {
        require_once '../model/UserRepository/' . $file . '.php';
    } elseif (file_exists('../API/' . $file . '.php')) {
        require_once '../API/' . $file . '.php';
    }
}

if (isset($_FILES['img'])) {

    if (in_array(ConfigApp::getFileExt(), ConfigApp::Expansion) === false) {
        $errors[] = "extension not allowed, please choose a JPEG or JPG or PNG file.";
    }
    if (ConfigApp::getFileSize() > ConfigApp::MaxFileSize) {
        $errors[] = 'File size must be excately 2 MB';
    }
    if (empty($errors) == true) {
        move_uploaded_file(ConfigApp::getFileTmp(), ConfigApp::imgPath().ConfigApp::getFileName());
    } else {
        echo 'Error';
    }
}

if (isset($_POST['user']) && isset($_POST['task'])) {

    $userRepo = new UserRepository();
    $taskRepo = new TaskRepository();
    $arrayUser = [
        'name' => $_POST['user']['name'],
        'email' => $_POST['user']['email']
    ];
    $arrayTask = [
        'text' => $_POST['task']['text'],
        'img' => $_FILES['img']['name']
    ];
    $user = new User();
    $user->setUser($arrayUser);
    $task = new Task();
    $task->setTask($arrayTask);
    $taskRepo->save($task, $user);
    $userRepo->save($task, $user);
} else {
    echo "no data";
}


