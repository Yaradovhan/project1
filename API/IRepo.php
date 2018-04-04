<?php
/**
 * Created by PhpStorm.
 * User: yara
 * Date: 03.04.18
 * Time: 16:14
 */

interface IRepo
{
    public function save(Entity $t, Entity $t);

    public function getAll();
    public function getAllById($id);

    /**
     * @param $id
     *
     * @return bool
     */
    public function deleteById($id);
    public function updateById($id);

}