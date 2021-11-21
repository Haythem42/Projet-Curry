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
         * 
         * @param $fragments
         */
        public function show($fragments = null) {

            $users = $this->daoUser->displayUser();

            $pageUser = Renderer::render('displayUsers.php', compact('users'));

            echo($pageUser);

        }


        /**
         * Function which deletes a user from the database.
         */
        public function delete() : void{

            if($_POST['idInput'] == $_SESSION['auth'][0]) {

                $_SESSION['result'] = "You can't delete your own account !";
                $_SESSION['color'] = "red";
                header('Location: /user/display');

            } else {


                try {

                    $success = $this->daoUser->deleteUser(htmlspecialchars($_POST["idInput"]));
    
                } 
                catch (\Exception $error) {}
    
                    // First case : if the request worked correctly ==> we redirect to displayUsers.php with a success flash message
                if ($success != 0) {
    
                    $_SESSION['result'] = "The user has been deleted correctly from the database !";
                    $_SESSION['color'] = "green";
                    header('Location: /user/display');
    
                }
                
                //Second case : if the request didn't worked correctly ==> we redirect to fireman.php with an error flash message
                else {
    
                    $_SESSION['result'] = "Oopsi... Check if this user has other relations in the DB !";
                    $_SESSION['color'] = "red";
                    header('Location: /user/display');
    
                }

            }
        }



        /**
         * Function which displays error404 page
         */
        public function error404() : void {

            $error404Page = Renderer::render('error404.php');

            echo $error404Page;
    
        }


        /**
         * Function which insert a new user in the database
         */
        public function insert() {

            $filter = new Filter($_POST);

            $filter->acceptVisitor('emailC', new MailVisitor());

            $filter->acceptVisitor('passwordC', new PasswordVisitor());

            $filter->acceptVisitor('firstNameC', new FirstNameVisitor());

            $filter->acceptVisitor('lastNameC', new LastNameVisitor());

            $filter->acceptVisitor('roleId', new RoleIdVisitor());


            $tableCheck = $filter->visit();

            $countValidity = 0;

            //Check if everything is correct
            foreach($tableCheck as $key => $value) {

                if($tableCheck[$key] == true) { $countValidity = $countValidity + 1; }

            }

            if($countValidity == count($tableCheck)) {


                $user = new User(
                    0,
                    htmlspecialchars($_POST["emailC"]),
                    htmlspecialchars($_POST["passwordC"]),
                    htmlspecialchars($_POST["firstNameC"]),
                    htmlspecialchars($_POST["lastNameC"]),
                    htmlspecialchars($_POST["roleId"]),
                    " ",
                    0
                );

                try {

                    $success = $this->daoUser->createUser($user);
    
                } catch (\Exception $error) {}

                //First case : if the request worked correctly ==> we redirect to fireman.php with a success flash message
                if ($success != 0) {

                    $_SESSION['result'] = "The user has been added to the database !";
                    $_SESSION['color'] = "green";
                    header('Location: /user/display');

                }
                
                //Second case : if the request didn't work correctly ==> we redirect to fireman.php with an error flash message
                else {

                    $_SESSION['result'] = "Oopsi... Something went wrong !";
                    $_SESSION['color'] = "red";
                    header('Location: /user/display');

                }

            } else {

                $_SESSION['result'] = "Oopsi... The values entered in the form are not validated by the filter.";
                $_SESSION['color'] = "red";
                header('Location: /user/display');

            }

        }



        /**
         * Function which displays the error403 page.
         */
        public function error403() : void {

            $error403Page = Renderer::render('error403.php');

            echo $error403Page;

        }


        
        /**
         * Function which update a user stored in the database
         */
        public function update() {

            $filter = new Filter($_POST);

            $filter->acceptVisitor('passwordM', new PasswordVisitor());

            $filter->acceptVisitor('idInputModify', new RoleIdVisitor());

            $tableCheck = $filter->visit();

            $countValidity = 0;

            //Check if everything is correct
            foreach($tableCheck as $key => $value) {

                if($tableCheck[$key] == true) { $countValidity = $countValidity + 1; }

            }

            if($countValidity == count($tableCheck)) {


                $user = new User(
                    htmlspecialchars($_POST["idInputModify"]),
                    " ",
                    htmlspecialchars($_POST["passwordM"]),
                    " ",
                    " ",
                    0,
                    " ",
                    0
                );

                try {

                    $success = $this->daoUser->modifyUser($user);
    
                } catch (\Exception $error) {}

                //First case : if the request worked correctly ==> we redirect to fireman.php with a success flash message
                if ($success != 0) {

                    $_SESSION['result'] = "The user has been updated !";
                    $_SESSION['color'] = "green";
                    header('Location: /user/display');

                }
                
                //Second case : if the request didn't work correctly ==> we redirect to fireman.php with an error flash message
                else {

                    $_SESSION['result'] = "Oopsi... Something went wrong !";
                    $_SESSION['color'] = "red";
                    header('Location: /user/display');

                }

            } else {

                $_SESSION['result'] = "Oopsi... The values entered in the form are not validated by the filter.";
                $_SESSION['color'] = "red";
                header('Location: /user/display');

            }

        }

    }

?>