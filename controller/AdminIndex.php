<?php

class AdminIndex extends AController
{

    public function get_body()
    {
        $taskRepository = new TaskRepository();
        $allTasks = $taskRepository->getAll();

        return $this->render('AdminIndex', ['title'=>'Admin User', 'allData' => $allTasks]);
    }
}