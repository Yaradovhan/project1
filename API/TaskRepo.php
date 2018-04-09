<?php

interface TaskRepo
{
    public function save($task, $user);

    public function getAll($start, $limit, $sort, $sortMainTable);

    public function deleteById($id);

    public function updateById($id);

}
