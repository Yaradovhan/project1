<?php

abstract class AController
{
    abstract function execute();

    /**
     * @param $file
     * @param $params
     * @return string
     * @throws Exception
     */
    protected function render($file, $params)
    {
        extract($params);
        ob_start();
        include('./view/' . $file . '.php');
        try {
            if (file_exists($file)) {
                return ob_get_clean();
            } else {
                throw new Exception ('Error, sorry');
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
