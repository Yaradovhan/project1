<?php

Class ConfigApp

{

    const HOST = 'localhost';
    const USER = 'root';
    const PASS = '';
    const DB = 'testdb';
    const MysqlDefaultSort = 'DESC';
    const MysqlLimit = 3;
    const Expansion = ["jpeg", "jpg", "png"];

    public static function imgPath()
    {
        return $_SERVER['DOCUMENT_ROOT']."/view/assets/img/";
    }

    public static function getFileName()
    {
        return $_FILES['img']['name'];
    }

    public static function getFileSize()
    {
        return $_FILES['img']['size'];
    }

    public static function getFileTmp()
    {
        return $_FILES['img']['tmp_name'];
    }

    public static function getFileType()
    {
        return $_FILES['img']['type'];
    }

    public static function getFileExt()
    {
        return strtolower(end(explode('.', $_FILES['img']['name'])));
    }

    public static function getAdmin()
    {
        return "/admin/";
    }

    public static function addTask()
    {
        return $_SERVER['SCRIPT_NAME'] . "?add";
    }

    public static function getBaseUrl()
    {
        $currentPath = $_SERVER['PHP_SELF'];

        $pathInfo = pathinfo($currentPath);

        $hostName = $_SERVER['HTTP_HOST'];

        $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"], 0, 5)) == 'https://' ? 'https://' : 'http://';

        return $protocol . $hostName . $pathInfo['dirname'] . "";
    }
}



