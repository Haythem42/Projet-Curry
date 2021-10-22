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

            $this->daoUser = new DAOUser(SingletonDBMaria::getInstance()->getConnection());

        }

        
        /**
         * Function which retrieves all the user stored in the database.
         */
        public function show($fragments = null) {

            $users = $this->daoUser->displayUser();
            $pageUser = Renderer::render('user.php', compact('users'));
            echo($pageUser);

        }

    }

?>