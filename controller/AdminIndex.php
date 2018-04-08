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
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $pass = isset($_POST['pass']) ? $_POST['pass'] : '';


        // [Separate Model Admin!!!!!!!!!]
        if ($name && $pass) {
            $conn = new ConnectionMySql();
            $sql = "SELECT * FROM admin WHERE name = '$name' and pass = '$pass'";
            $result = mysqli_query($conn->getConnection(), $sql);
//        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);
//        var_dump($count);
            if ($count === 1) {
                $_SESSION['is_admin'] = 1;
//                header("Location: " . ADMIN, true);
            }

        }

//        $adminModel = new adminModel();
//        $bool = $adminModel->isAdmin($name, $pass);
//        if($bool){
//            $_SESSION['is_admin'] = 1;
//        }

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
