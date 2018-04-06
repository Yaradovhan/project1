<?php
require_once "AController.php";

class Index extends AController
{

    public function get_body($start = null, $limit = null)
    {

        $taskRepository = new TaskRepository();
        $allTasks = $taskRepository->getAll($start, $limit);

        return $this->render(
            'Index',
            [
                'title' => 'Index Page',
                'allTask' => $allTasks
            ]
        );
    }
}
