<?php

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
        //$task->getDsc();
        $resultSaveTask = mysqli_query($this->connection->getConnection(), "INSERT INTO `tasks`(`text`, `img`) VALUES ('" . $task->getText() . "','" . $task->getImg() . "')");
//        $res .= mysqli_query($this->connection->getConnection(),"INSERT INTO `users`(`name`, `email`) VALUES ('" . $user->getName() . "','" . $user->getEmail() . "')");
//        $res .= mysqli_query($this->connection->getConnection(),"INSERT INTO `users_tasks` ( user_id, task_id ) VALUES ((SELECT max(id) FROM users),(SELECT max(id) FROM tasks))");

//        if($user) {
//           $resultBandleTaksToUser = mysqli_query($this->connection->getConnection(),"INSERT INTO `users_tasks` ( user_id, task_id ) VALUES ('" . $user->getId() . "', " . $task->getId() . ") ");
//       }
        return $resultSaveTask;
    }

    public function getAll()
    {

        $query = "SELECT t.id, t.text, t.img, t.date, u.name, u.email 
                                                FROM tasks t 
                                                LEFT JOIN users_tasks ut 
                                                ON t.id = ut.task_id 
                                                LEFT JOIN users u 
                                                ON u.id = ut.user_id";
//        WHERE main

//        if($sort) {
//            $query.=" ORDER BY u . $sort DESC";
//        }
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
     * @param $id
     *
     * @return bool|mysqli_result
     */
    public function updateById($id)
    {
        $res = mysqli_query($this->connection->getConnection(), "UPDATE () * WHERE id = id " );
        return $res;
    }

    public function getAllByName()
    {
        $res = mysqli_query($this->connection->getConnection(), "SELECT t . id, t . text, t . img, t . date, u . name, u . email
                                                FROM tasks t
                                                LEFT JOIN users_tasks ut
                                                ON t . id = ut . task_id
                                                LEFT JOIN users u
                                                ON u . id = ut . user_id
                                                ORDER BY u . name DESC");
        if (!$res) {
            return false;
        }
        for ($i = 0; $i < mysqli_num_rows($res); $i++) {
            $all = mysqli_fetch_array($res, MYSQLI_ASSOC);
            $task = new Task();
            $task->setTask(['id' => $all['id'], 'text' => $all['text'], 'img' => $all['img'], 'date' => $all['date']]);
            $user = new User();
            $user->setUser(['email' => $all['email'], 'name' => $all['name']]);
            $this->data[$i]['task'] = $task->getTask();
            $this->data[$i]['user'] = $user->getUser();
        }
        return $this->data;
    }

    public function getAllByEmail()
    {
        $res = mysqli_query($this->connection->getConnection(), "SELECT t . id, t . text, t . img, t . date, u . name, u . email
                                                FROM tasks t
                                                LEFT JOIN users_tasks ut
                                                ON t . id = ut . task_id
                                                LEFT JOIN users u
                                                ON u . id = ut . user_id
                                                ORDER BY u . email DESC");
        if (!$res) {
            return false;
        }
        for ($i = 0; $i < mysqli_num_rows($res); $i++) {
            $all = mysqli_fetch_array($res, MYSQLI_ASSOC);
            $task = new Task();
            $task->setTask(['id' => $all['id'], 'text' => $all['text'], 'img' => $all['img'], 'date' => $all['date']]);
            $user = new User();
            $user->setUser(['email' => $all['email'], 'name' => $all['name']]);
            $this->data[$i]['task'] = $task->getTask();
            $this->data[$i]['user'] = $user->getUser();
        }
        return $this->data;
    }


}