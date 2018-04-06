<?php

class AdminIndex extends AdminAController
{

    public function execute($params = null)
    {
        $taskRepository = new TaskRepository();
        $allTasks = $taskRepository->getAll();

        return $this->render('AdminIndex', ['title'=>'Admin User', 'allData' => $allTasks]);
    }
}