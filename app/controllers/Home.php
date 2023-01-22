<?php
class Home 
{
    //实现 Trait
    use Controller;
    public function index($a='',$b='',$c='')
    {

        $userModel = new User;
        // $arr['id'] = 1;
        // $arr['password']='tony123';
        // $arr['name'] = 'alice';
        // $arr['password'] = 'alice123';

        // $result = $userModel->getAll();
        // $result = $model->insert($arr);
        // show($a);
        // show($b);
        // show($c);
        // echo "This is the home controller";

        $this->view('home');
    }

    public function edit($a = '', $b='', $c='')
    {
        show("from edit funciton");
        $this->view('home');
    }

    
}

