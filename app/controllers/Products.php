<?php

class Products extends Controller
{
    public function index($a='',$b='',$c='')
    {
        echo "This is the product controller";
        $this->view('products/products');
    }

    
}
