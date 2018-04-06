<?php

function getBaseUrl()
{
    // output: /myproject/index.php
    $currentPath = $_SERVER['PHP_SELF'];

    // output: Array ( [dirname] => /myproject [basename] => index.php [extension] => php [filename] => index )
    $pathInfo = pathinfo($currentPath);

    // output: localhost
    $hostName = $_SERVER['HTTP_HOST'];

    // output: http://
    $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https://'?'https://':'http://';

    // return: http://localhost/myproject/
    return $protocol.$hostName.$pathInfo['dirname']."/";
}

define("HOST", 'localhost');
define("USER", 'root');
define("PASS", '799pgnJY2TE40tma');
define("DB", 'project1');
define("HOME", 'http://project1.loc/index.php');
define("CURRENT_URL", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}");
define("ADMIN", CURRENT_URL . 'admin/');
define("ADD_TASK", CURRENT_URL . 'index.php?add');
define("IMAGE", "E:/OS/OSPanel/domains/project1/view/assets/img/");


Class ConfigApp
{

 const HOST = 'localhost';
 const USER = 'root';
 const PASS = '799pgnJY2TE40tma';
 const HOME = 'http://project1.loc/index.php';
 const MysqlDescSort = 'DESC';

 const MysqlLimit = 3;
// const CURRENT_URL = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";


}

session_start();

