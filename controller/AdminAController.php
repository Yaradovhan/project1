<?php

abstract class AdminAController
{
    /**
     * @param null $params
     *
     * @return mixed
     */
    abstract function execute($params = null);

    protected function render($file, $params)
    {
        extract($params);
        ob_start();
        include('../view/' . $file . '.php');
        return ob_get_clean();
    }
}