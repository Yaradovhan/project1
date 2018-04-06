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
        $task = new Task();
        $task->setTask($params);
        return $this->taskRepository->updateById($task);
    }

    /**
     * AdminEdit constructor.
     *
     * @param TaskRepository $taskRepository
     */
    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }
}