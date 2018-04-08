<?php
require_once "AdminAController.php";

class AdminEdit extends AdminAController
{
    /**
     * AdminEdit constructor.
     *
     * @param TaskModel $taskRepository
     */
    public function __construct(TaskModel $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * task[id]
     * task[text]
     *
     * @param null $params
     * @return bool|mysqli_result
     */
    public function execute($params = null)
    {
        $task = new Task();
        $task->setTask($params);
        return $this->taskRepository->updateById($task);
    }

}