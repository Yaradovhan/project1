<?php

interface UserRepo
{
    public function save($task, $user);

    public function getAll();

    public function getById($id);

    public function deleteById($id);

    public function updateById($id);
}