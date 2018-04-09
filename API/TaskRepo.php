<?php

interface TaskRepo
{
    /**
     * @param $task
     * @param $user
     * @return mixed
     */
    public function save($task, $user);

    public function getAll($start, $limit, $sort, $sortMainTable);

    public function deleteById($task);

    public function updateById($id);

}
