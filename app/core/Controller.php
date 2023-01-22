<?php
Trait Controller
{
    public function view($name)
    {

        //解析路由，根据路由在 controllers 文件夹下找对应的控制器
        $filename = "../app/views/".$name.".php";
        if(file_exists($filename))
        {
            require $filename;
        }else{
            // echo "controller not found";
            $filename = "../app/views/404.view.php";
            require $filename;
        }

        
    }
}