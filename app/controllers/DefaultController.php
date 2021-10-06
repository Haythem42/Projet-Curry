<?php

namespace app\controllers;

require_once '../autoloader.php';

use app\utils\Renderer;


class DefaultController{



    public function home() {
        $home = Renderer::render('home.php');
        echo $home;
    }


    
}