<?php

require_once "AController.php";

class Index extends AController
{
    /**
     * @param null $start
     * @param null $limit
     * @return string
     */
    public function get_body($start = null, $limit = null)
    {

        $taskRepository = new TaskModel();
        $sort = null;
        if (isset($_GET['sort'])) {
            if ($_GET['sort'] == 'name') {
                $sort = "name";
            } elseif ($_GET['sort'] == 'email') {
                $sort = "email";
            }
        }

        $allTasks = $taskRepository->getAll($start, $limit, $sort);

        return $this->render(
            'Index',
            [
                'title' => 'Index Page',
                'allTask' => $allTasks
            ]
        );
    }
}
