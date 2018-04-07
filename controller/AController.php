<?php

abstract class AController
{
    abstract function get_body();

    protected function render($file, $params)
    {
        extract($params);

        var_dump($params);

        ob_start();
        include('./view/' . $file . '.php');
        return ob_get_clean();
    }
}