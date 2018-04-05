<?php

/**
 * Created by PhpStorm.
 * User: yara
 * Date: 03.04.18
 * Time: 10:23
 */
abstract class AdminAController
{
    /**
     * @param null $params
     *
     * @return mixed
     */
    abstract function execute($params = null);

//    protected function render($file, $params)
//    {
//        extract($params);
//        ob_start();
//        include('../view/' . $file . '.php');
//        return ob_get_clean();
//    }
}