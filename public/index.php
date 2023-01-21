<?php

session_start();

// 加载文件
require "../app/core/init.php";

// 初始化 App 实例
$app = new App;
$app->loadController();


