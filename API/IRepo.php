<?php
/**
 * Created by PhpStorm.
 * User: yara
 * Date: 03.04.18
 * Time: 16:14
 */

interface IRepo
{
    public function save($item);
    public function getAll();
    public function getAllById($id);
    public function deleteById($id);
    public function updateById($id);

}