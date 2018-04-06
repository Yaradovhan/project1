<?php
require_once "AdminAController.php";

class AdminEdit extends AdminAController
{
    /**
     * task[id]
     * task[text]
     *
     * @param null $params
     * @return bool|mysqli_result
     */
    public function execute($params = null)
    {
        $repoTask = new TaskRepository();
        $task = new Task();
        $task->setTask($params);
        return $repoTask->updateById($task);
    }
}