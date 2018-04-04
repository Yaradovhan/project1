<?php
/**
 * Created by PhpStorm.
 * User: yara
 * Date: 03.04.18
 * Time: 16:17
 */
include '../model/User.php';

class UserRepository
{
    public function save()
    {

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
}