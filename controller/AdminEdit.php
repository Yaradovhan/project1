<?php
require_once "AdminAController.php";

class AdminEdit extends AdminAController
{
    /**
     * task[id]
     * task[text]
     *
     * @param null $params
     */
    public function execute($params = null)
    {

        $repoTask = new TaskRepository();

        $task = new Task();
//        var_dump($params);
        $task->setTask($params);

//        var_dump($task);
        return $repoTask->updateById($task);
//        echo 111212;
//        $taskRepository = new TaskRepository();
//        $allTasks = $taskRepository->getAll();
//
//        return $this->render('AdminIndex', ['title'=>'Admin User', 'allData' => $allTasks]);
    }
}