<?php

interface Repo
{
    public function save($t, $u);

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