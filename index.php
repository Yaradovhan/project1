<?php

include 'config.php';

//Include Task Repository
include './API/TaskRepository.php';
include './API/UserRepository.php';

header("Content-Type:text/html;charset='utf8_general_ci'");

function __autoload($file)
{
    if (file_exists('controller/' . $file . '.php')) {
        require_once 'controller/' . $file . '.php';
    } else {
        require_once 'model/' . $file . '.php';
    }
}

//$taskRepository = new TaskRepository();

//$allTasks = $taskRepository->getAll();
//$getAllByName = $taskRepository->getAllByName();
//$getAllByEmail = $taskRepository->getAllByEmail();
////$deleteById = $taskRepository->deleteById($_GET['id']);
//$save = $taskRepository->save();
//echo "<pre>";
//print_r($allTasks);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>11222</title>
</head>
<body>
<h2>Header</h2>
<hr>
<form  method="POST" action="">
    <table width="450px">
        <tr>
            <td valign="top">
                <label for="name">Name *</label>
            </td>
            <td valign="top">
                <input type="text" name="user[name]" maxlength="50" size="30" value="">
            </td>
        </tr>
<!--        <tr>-->
<!--            <td valign="top">-->
<!--                <label for="email">Email *</label>-->
<!--            </td>-->
<!--            <td valign="top">-->
<!--                <input  type="text" name="user[email]" maxlength="80" size="30">-->
<!--            </td>-->
<!--        </tr>-->
        <tr>
            <td valign="top">
                <label for="comments">Text *</label>
            </td>
            <td valign="top">
                <textarea  name="task[text]" maxlength="1000" cols="29" rows="6"></textarea>
            </td>
        </tr>
        <tr>
            <td valign="top">
                <label for="comments">Image *</label>
            </td>
            <td valign="top">
                <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
                <input name="image" type="file" />
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:left">
                <input type="submit" value="Add Task">
            </td>
        </tr>
    </table>
</form>
<hr>
<h3>Footer</h3>
</body>
</html>

<?php
$r = 1;
if(isset($_POST['user']) && isset($_POST['task'])){

    /**
     * add image script
     * ---------------
     */

    $_POST['task']['image'] = 'image/path';

    $taskRepository = new TaskRepository();


    /** @var Task $task */
    $task = new Task();
    $task->setTask($_POST['task']);


//    $task->set
    /** @var User $user */
    $user = null;
    //if a user registered.
    $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
    $userId = 1;

    if($userId) {
        $userRepo = new UserRepository();


//        $arrayUser = ['id' => 1, 'name' => 'admin', 'email' => 'email@list.ru'];
//        $user = new User();
//        $user->setUser($arrayUser);
        $currentUser = $userRepo->getById($userId);
//        $user = new User();
//        $user->setId();
    }

    $taskRepository->save($task, $currentUser);
}
