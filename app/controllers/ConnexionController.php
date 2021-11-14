<?php

    namespace app\controllers;

    require_once '../autoloader.php';

    use app\models\Auth;


    class ConnexionController extends BaseController{

        /**
         * Function which logout a user.
         */
        public function exit() {

            Auth::logout();
            
        }

    }

?>