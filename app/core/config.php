<?php
if($_SERVER['SERVER_NAME'] == 'localhost'){
    define('DBNAME', 'simple_mvc_db');
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBDRIVER', '');
    define('ROOT', 'http://localhost/simpleMVCFramework/public');
}else{
    define('DBNAME', 'simple_mvc_db');
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBDRIVER', '');
    define('ROOT', 'https://www.publishsite.com');
}

define('APP_NAME','simple mvc app');
define('APP_DESC', 'a simple mvc app');

define('DEBUG', true);