<?php

    namespace app\controllers;

    require_once '../autoloader.php';

    use app\utils\Renderer;


    class DefaultController{

        /**
         * Function which render the home page when called
         */
        public function connexion() {

            $connexionPage = Renderer::render('connexion.php');
            
            echo $connexionPage;
            
        }

    }

?>