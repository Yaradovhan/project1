<?php

interface UserRepo
{
    /**
     * @param $task
     * @param $user
     * @return mixed
     */
    public function save($task, $user);

    public function getAll();

    public function getById($id);

    public function deleteById($id);

    public function updateById($id);
}