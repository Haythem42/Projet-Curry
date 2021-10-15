<?php

    namespace app\controllers;


    use app\models\DAOUser;
    use app\utils\SingletonDBMaria;
    use app\utils\Renderer;
    use app\models\User;


    class UserController extends BaseController {

        private DAOUser $daoUser;

        /**
         * Constructor of the class which initialize the DAO object of the controller
         * 
         */
        public function __construct() {

            $this->daoPompier = new DAOUser(SingletonDBMaria::getInstance()->getConnection());

        }

        

    }

?>