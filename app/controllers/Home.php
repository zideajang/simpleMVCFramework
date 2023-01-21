<?php
class Home extends Controller
{
    public function index($a='',$b='',$c='')
    {

        $userModel = new User;
        // $arr['id'] = 1;
        // $arr['password']='tony123';
        // $arr['name'] = 'alice';
        // $arr['password'] = 'alice123';

        $result = $userModel->getAll();
        // $result = $model->insert($arr);
        show($result);
        // echo "This is the home controller";

        $this->view('home');
    }

    
}

