<?php
class App
{
    private $controller = 'Home';
    private $method = 'index';
    private function splitURL()
    {
        $URL = $_GET['url'] ?? 'home';
        $URL = explode("/", $URL); #/123/123?id=1 = [[0]=>123,[]]
        return $URL;

    }
    //加载控制器(controller)
    public function loadController()
    {
        // 实例
        $URL = $this->splitURL();

        //解析路由，根据路由在 controllers 文件夹下找对应的控制器
        $filename = "../app/controllers/".ucfirst($URL[0]).".php";
        if(file_exists($filename))
        {
            require $filename;
            $this->controller = ucfirst($URL[0]);
        }else{
            // echo "controller not found";
            $filename = "../app/controllers/_404.php";
            require $filename;
            $this->controller = "_404";
        }

        // $home->index();
        $controller = new $this->controller;
        call_user_func_array([$controller, $this->method], []);

    }
}