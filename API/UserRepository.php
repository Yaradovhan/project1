<?php
/**
 * Created by PhpStorm.
 * User: yara
 * Date: 03.04.18
 * Time: 16:17
 */
//include '../model/User.phpp';

class UserRepository
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

    public function save($task, $user)
    {
        $resultSaveUser = mysqli_query($this->connection->getConnection(),"INSERT INTO `users`(`name`, `email`) VALUES ('" . $user->getName() . "','" . $user->getEmail() . "')");
        if($task)
        {
//            $resultBandleTaksToUser = mysqli_query($this->connection->getConnection(),"INSERT INTO `users_tasks` ( user_id, task_id ) VALUES ('" . $user->getId() . "', " . $task->getId() . ") ");
            $resultBandleTaksToUser = mysqli_query($this->connection->getConnection(),"INSERT INTO `users_tasks` ( user_id, task_id ) VALUES ((SELECT max(id) FROM users),(SELECT max(id) FROM tasks))");
        }
        return $resultSaveUser;
    }
    public function getAll()
    {

    }
    public function getById($id)
    {
        $arrayUser = ['id' => 1, 'name' => 'admin', 'email' => 'email@list.ru'];
        $user = new User();
        $user->setUser($arrayUser);
        return $user;
    }

    public function deleteById($id)
    {

    }
    public function updateById($id)
    {

    }

    public function getAllById($id)
    {

    }
}