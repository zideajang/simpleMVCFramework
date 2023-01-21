<?php

function show($stuff)
{
    echo "<pre>";
    print_r($stuff);
    echo "</pre>";
}

// show($_GET);
function splitURL()
{
    $URL = $_GET['url'] ?? 'home';
    $URL = explode("/", $URL);
    return $URL;

}
// show($URL);

function loadController()
{
    $URL = splitURL();
    $filename = "../app/controllers/".ucfirst($URL[0]).".php";
    if(file_exists($filename))
    {
        require $filename;
    }else{
        // echo "controller not found";
        $filename = "../app/controllers/_404.php";
        require $filename;
    }
}


loadController();