<?php
/**
 * Created by PhpStorm.
 * User: yara
 * Date: 03.04.18
 * Time: 16:17
 */

/**
 * Class TaskRepository
 */
class TaskRepository implements IRepo
{
    /**
     * @var ConnectionMySql
     */
    protected $connection;

    /**
     * TaskRepository constructor.
     */
    public function __construct()
    {
        $this->connection = new ConnectionMySql();
    }

    public function save($task)
    {

    }

    public function getAll()
    {
        $res = mysqli_query($this->connection->getConnection(), "SELECT t.id, t.text, t.img, t.date, u.name, u.email 
                                                FROM tasks t 
                                                LEFT JOIN users_tasks ut 
                                                ON t.id = ut.task_id 
                                                LEFT JOIN users u 
                                                ON u.id = ut.user_id");
        if(!$res)
        {
            return false;
        }
        for ($i = 0; $i < mysqli_num_rows($res);$i++)
        {
            $all = mysqli_fetch_array($res, MYSQLI_ASSOC);
//        echo "<pre>";
//        print_r($all);
//        die();
            $task = new Task();
            $task->setTask( ['id' => $all['id'], 'text' => $all['text'], 'img' => $all['img'], 'date' => $all['date']]);
//        echo "<pre>";
//        print_r($task->getTask());
//        die();
            $user = new Users();
            $user->setUser( ['email' => $all['email'], 'name' => $all['name']]);

            $this->data[$i]['task'] = $task->getTask();
            $this->data[$i]['user'] = $user->getUser();
        }
//        echo "<pre>";
//        print_r($this->data);
//        die();
        return $this->data;
    }

    public function getAllById($id)
    {

    }

    public function deleteById($id)
    {
        $res = mysqli_query($this->connection->getConnection(), "DELETE t.*, ut.*
                                        FROM tasks t
                                        LEFT JOIN users_tasks ut ON t.id = ut.task_id
                                        WHERE t.id = '$id'");
        return $res;
    }

    public function updateById($id)
    {
        $res = mysqli_query($this->connection->getConnection(),"INSERT * ");
        return $res;
    }
}