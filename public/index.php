<?php

session_start();

// 加载文件
require "../app/core/init.php";

// 初始化 App 实例
DEBUG ? ini_set('display_errors', 1):ini_set('display_errors', 0);
$app = new App;
$app->loadController();


