<?php

require_once('Task.php');

class TaskRepository implements TaskRepo
{
    /**
     * @var ConnectionMySql
     */
    public $connection;

    /**
     * TaskModel constructor.
     */
    public function __construct()
    {
        $this->connection = new ConnectionMySql();
    }

    /**
     * @param Task $task
     * @param User|null $user
     *
     * @return bool|mysqli_result
     */
    public function save($task, $user = null)
    {
        $resultSaveTask = mysqli_query($this->connection->getConnection(),
            "INSERT INTO `tasks`(`text`, `img`) 
                   VALUES ('" . $task->getText() . "','" . $task->getImg() . "')");

        return $resultSaveTask;
    }

    /**
     * @param null $start
     * @param int $limit
     * @param null $sort
     * @param bool $sortMainTable
     * @return array|bool
     */
    public function getAll($start = null, $limit = ConfigApp::MysqlLimit, $sort = null, $sortMainTable = true)
    {
        $query = "SELECT main_table.id, main_table.text, main_table.img,
                         main_table.date, reference_table.name, reference_table.email 
                                                FROM tasks main_table 
                                                LEFT JOIN users_tasks ut 
                                                ON main_table.id = ut.task_id 
                                                LEFT JOIN users reference_table 
                                                ON reference_table.id = ut.user_id
                                               ";
        if ($sort) {
            $sortTable = $sortMainTable ? 'main_table' : 'reference_table';
            $query .= " ORDER BY $sortTable.$sort " . ConfigApp::MysqlDefaultSort;
        }

        $query .= " LIMIT $start, $limit";

        $res = mysqli_query($this->connection->getConnection(), $query);
        if (!$res) {
            return false;
        }
        $data = [];
        for ($i = 0; $i < mysqli_num_rows($res); $i++) {
            $all = mysqli_fetch_array($res, MYSQLI_ASSOC);
            $task = new Task();
            $task->setTask([
                'id' => $all['id'],
                'text' => $all['text'],
                'img' => $all['img'],
                'date' => $all['date']
            ]);
            $user = new User();
            $user->setUser([
                'email' => $all['email'],
                'name' => $all['name']
            ]);
            $data[$i]['task'] = $task->getTask();
            $data[$i]['user'] = $user->getUser();
        }

        return $data;
    }

    /**
     * @param $id
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
     * @return bool|mysqli_result
     */
    public function updateById($task)
    {
        $res = mysqli_query(
            $this->connection->getConnection(),
            "UPDATE tasks SET text='{$task->getText()}' WHERE id = '{$task->getId()}'"
        );

        return $res;
    }
}