<?php

    namespace app\controllers;

    require_once '../autoloader.php';

    use app\models\Auth;
    use app\utils\Renderer;


    class ConnexionController extends BaseController{

        /**
         * Function which logout a user.
         */
        public function exit() {

            Auth::logout();
            
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