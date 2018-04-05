<?php

class Index extends AController
{

    public function get_body()
    {
        $taskRepository = new TaskRepository();
        $allTasks = $taskRepository->getAll();

        return $this->render(
            'Index',
            [
                'title' => 'Index Page',
                'allTask' => $allTasks
            ]
        );
    }
}
