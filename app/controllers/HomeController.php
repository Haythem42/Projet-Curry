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


        /**
         * Function which displays error404 page
         */
        public function error404() : void {

            $error404Page = Renderer::render('error404.php');

            echo $error404Page;
    
        }

    }

?>