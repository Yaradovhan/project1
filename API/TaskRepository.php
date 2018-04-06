<?php

//require_once ('../model/User.php');
//require_once '../model/Task.php';

class TaskRepository
{
    public $data = [];
    /**
     * @var ConnectionMySql
     */
    public $connection;

    /**
     * TaskRepository constructor.
     */
    public function __construct()
    {
        $this->connection = new ConnectionMySql();
    }

    /**
     * @param Task $task
     * @param User|null $user
     * @return bool|mysqli_result
     */
    public function save($task, $user = null)
    {
        $resultSaveTask = mysqli_query($this->connection->getConnection(), "INSERT INTO `tasks`(`text`, `img`) VALUES ('" . $task->getText() . "','" . $task->getImg() . "')");

        return $resultSaveTask;
    }

    public function getAll($start, $limit)
    {
        $query = "SELECT t.id, t.text, t.img, t.date, u.name, u.email 
                                                FROM tasks t 
                                                LEFT JOIN users_tasks ut 
                                                ON t.id = ut.task_id 
                                                LEFT JOIN users u 
                                                ON u.id = ut.user_id
                                                LIMIT $start, $limit";
//        WHERE main

        if ($_GET['sort'] == 'name') {
            $query .= " ORDER BY u.name DESC";
        } elseif ($_GET['sort'] == 'email') {
            $query .= " ORDER BY u.email DESC";
        }
        
        $res = mysqli_query($this->connection->getConnection(), $query);
        if (!$res) {
            return false;
        }
        $data = [];
        for ($i = 0; $i < mysqli_num_rows($res); $i++) {
            $all = mysqli_fetch_array($res, MYSQLI_ASSOC);
            $task = new Task();
            $task->setTask(['id' => $all['id'], 'text' => $all['text'], 'img' => $all['img'], 'date' => $all['date']]);
            $user = new User();
            $user->setUser(['email' => $all['email'], 'name' => $all['name']]);
            $data[$i]['task'] = $task->getTask();
            $data[$i]['user'] = $user->getUser();
        }

        return $data;
    }

    public function getAllById($id)
    {

    }

    /**
     * @param $id
     *
     * @return bool|mysqli_result
     */
    public function deleteById($id)
    {
        $res = mysqli_query($this->connection->getConnection(), "DELETE t.*, ut.*
                                        FROM tasks t
                                        LEFT JOIN users_tasks ut ON t.id = ut.task_id
                                        WHERE t.id = '$id'");
        return $res;
    }

    /**
     * @param $task
     *
     * @return bool|mysqli_result
     */
    public function updateById($task)
    {
        $res = mysqli_query($this->connection->getConnection(), "UPDATE tasks SET text='{$task->getText()}' WHERE id = '{$task->getId()}'");
        return $res;
    }

    public function getAllLimit()
    {

    }

}