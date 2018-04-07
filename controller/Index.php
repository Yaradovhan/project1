<?php

require_once "AController.php";

class Index extends AController
{
    /**
     * @return string
     */
    public function execute()
    {

        $sortMainTable = true;
        $limit = 3;
        if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
        $start = ($page-1) * $limit;

        $sort = null;
        if (isset($_GET['sort'])) {
            if ($_GET['sort'] == 'name') {
                $sort = "name";
            } elseif ($_GET['sort'] == 'email') {
                $sort = "email";
            }
            $sortMainTable = false;
        }

        $sortParam = null;
        if ($sort) {
            $sortParam = '&sort=' . $sort;
        }
        $taskRepository = new TaskModel();
        $allTasks = $taskRepository->getAll($start, $limit, $sort, $sortMainTable);

        return $this->render(
            'Index',
            [
                'title' => 'Index Page',
                'allTask' => $allTasks,
                'sort' => $sortParam
            ]
        );
    }
}
