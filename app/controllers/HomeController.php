<?php

    namespace app\controllers;

    require_once '../autoloader.php';

    use app\utils\Renderer;


    class HomeController extends BaseController{

        /**
         * Function which render the home page when called
         */
        public function home() {

            $homePage = Renderer::render('home.php');
            echo $homePage;
            
        }

    }

?>