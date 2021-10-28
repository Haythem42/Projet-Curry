<?php

    namespace app\controllers;

    session_start();

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
         * 
         * @param $fragments
         */
        public function show($fragments = null) {

            $fullUsers = $this->daoUser->displayUser();
            $pageUser = Renderer::render('displayUsers.php', compact('fullUsers'));
            echo($pageUser);

        }


        /**
         * Function which deletes a user from the database.
         */
        public function delete() : void{

            try {

                $success = $this->daoUser->deleteUser(htmlspecialchars($_POST["userToDelete"]));

            } catch (\Exception $error) {}

            //First case : if the request worked correctly ==> we redirect to displayUsers.php with a success flash message
            if ($success != 0) {

                $_SESSION['result'] = "The user has been deleted correctly from the database !";
                $_SESSION['color'] = "green";
                header('Location: ../user/display');

            }
            
            //Second case : if the request didn't worked correctly ==> we redirect to fireman.php with an error flash message
            else {

                $_SESSION['result'] = "Oopsi... It seems like the user hasn't been deleted correctly from the database !";
                $_SESSION['color'] = "red";
                header('Location: ../user/display');

            }
        }



        /**
         * Function which displays error404 page
         */
        public function error() : void {

            $errorPage = Renderer::render('error404.php');
            echo $errorPage;
    
        }


        /**
         * Function which insert a new user in the database
         */
        public function insert() {

            $filter = new Filter($_POST);

            $filter->acceptVisitor('idInput', new IdVisitor());
            $filter->acceptVisitor('loginInput', new LoginVisitor());
            $filter->acceptVisitor('passwordInput', new PasswordVisitor());
            $filter->acceptVisitor('roleIdInput', new IdVisitor());

            $tableCheck = $filter->visit();

            $countValidity = 0;

            //Check if everything is correct
            foreach($tableCheck as $key => $value) {

                if($tableCheck[$key] == true) { $countValidity = $countValidity + 1; }

            }

            if($countValidity == count($tableCheck)) {



                $user = new User(
                    htmlspecialchars($_POST['idInput']),
                    htmlspecialchars($_POST['loginInput']),
                    htmlspecialchars(password_hash($_POST['passwordInput'], PASSWORD_DEFAULT)),
                    htmlspecialchars($_POST['roleIdInput']),
                );

                try {

                    $success = $this->daoUser->createUser($user);
    
                } catch (\Exception $error) {}

                //First case : if the request worked correctly ==> we redirect to fireman.php with a success flash message
                if ($success != 0) {

                    $_SESSION['result'] = "The user has been added to the database !";
                    $_SESSION['color'] = "green";
                    header('Location: ../user/display');

                }
                
                //Second case : if the request didn't work correctly ==> we redirect to fireman.php with an error flash message
                else {

                    $_SESSION['result'] = "Oopsi... It seems like the user hasn't been added correctly to the database !";
                    $_SESSION['color'] = "red";
                    header('Location: ../user/display');

                }

            } else {

                $_SESSION['result'] = "Oopsi... The values entered in the form are not validated by the filter.";
                $_SESSION['color'] = "red";
                header('Location: ../user/display');

            }

        }


        /**
         * Function which update a user stored in the database
         */
        public function update() {

            $filter = new Filter($_POST);

            $filter->acceptVisitor('idInputModify', new IdVisitor());
            $filter->acceptVisitor('loginInputModify', new LoginVisitor());
            $filter->acceptVisitor('passwordInputModify', new PasswordVisitor());
            $filter->acceptVisitor('roleIdInputModify', new IdVisitor());

            $tableCheck = $filter->visit();

            $countValidity = 0;

            //Check if everything is correct
            foreach($tableCheck as $key => $value) {

                if($tableCheck[$key] == true) { $countValidity = $countValidity + 1; }

            }

            if($countValidity == count($tableCheck)) {



                $user = new User(
                    htmlspecialchars($_POST['idInputModify']),
                    htmlspecialchars($_POST['loginInputModify']),
                    htmlspecialchars(password_hash($_POST['passwordInputModify'], PASSWORD_DEFAULT)),
                    htmlspecialchars($_POST['roleIdInputModify']),
                );

                try {

                    $success = $this->daoUser->modifyUser($user);
    
                } catch (\Exception $error) {}

                //First case : if the request worked correctly ==> we redirect to fireman.php with a success flash message
                if ($success != 0) {

                    $_SESSION['result'] = "The user has been updated !";
                    $_SESSION['color'] = "green";
                    header('Location: ../user/display');

                }
                
                //Second case : if the request didn't work correctly ==> we redirect to fireman.php with an error flash message
                else {

                    $_SESSION['result'] = "Oopsi... It seems like the user hasn't been updated correctly !";
                    $_SESSION['color'] = "red";
                    header('Location: ../user/display');

                }

            } else {

                $_SESSION['result'] = "Oopsi... The values entered in the form are not validated by the filter.";
                $_SESSION['color'] = "red";
                header('Location: ../user/display');

            }

        }

    }

?>