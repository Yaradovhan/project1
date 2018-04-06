<?php

class AdminIndex extends AdminAController
{
    /**
     * @param null $params
     *
     * @return bool|string
     */
    public function execute($params = null)
    {
        if (!isset($_SESSION['is_admin'])) {

            return $this->render('LoginAdmin', [
                'type' => 'error',
                'text' => 'You were logged out, sorry:)'
            ]);
        } else {

            $repo = new TaskRepository();
            $allTasks = $repo->getAll();

            return $this->render('AdminIndex', [
                'title' => 'Admin User',
                'allData' => $allTasks
            ]);
        }
    }
}
