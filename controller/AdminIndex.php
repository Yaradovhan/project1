<?php

require_once 'AController.php';

class AdminIndex extends AdminAController
{
    /**
     * @param null $params
     * @param null $start
     * @param null $limit
     * @return mixed|string
     */
    public function execute($start = null, $limit = null)
    {
        if (!isset($_SESSION['is_admin'])) {

            return $this->render('LoginAdmin', [
                'type' => 'error',
                'text' => 'You were logged out, sorry:)'
            ]);
        } else {

            $repo = new TaskModel();
            $allTasks = $repo->getAll($start, $limit);
            return $this->render('AdminIndex', [
                'title' => 'Admin User',
                'allData' => $allTasks
            ]);
        }
    }
}
