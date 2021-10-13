<?php

    namespace app\controllers;


    use app\models\DAOFireman;
    use app\utils\SingletonDBMaria;
    use app\utils\Renderer;
    use app\models\Fireman;

    session_start();


    class FiremanController extends BaseController {

        private DAOFireman $daoPompier;


        /**
         * Constructor of the class which initialize the DAO object of the controller
         * 
         */
        public function __construct() {

            $this->daoPompier = new DAOFireman(SingletonDBMaria::getInstance()->getConnection());

        }





        /**
         * Function which display the page fireman.php according to the fragments variable
         * 
         * @param int $fragments
         */
        public function show($fragments = null) {

            //First case : if the fragment has a particular value
            if (isset($fragments)) {

                if (is_numeric($fragments)) {

                    $firemen = $this->daoPompier->findAllFiremen((intval($fragments)*10)-10,10);
                    $pageFireman = Renderer::render('fireman.php', compact('firemen'));
                    echo($pageFireman);

                } else {

                    $firemen = $this->daoPompier->findByName($fragments);
                    $pageFireman = Renderer::render('firemanSearched.php', compact('fragments','firemen'));
                    echo($pageFireman);

                }

            }

            //Second case : if the fragment has no value we display all the firemen stored in the database
            else {

                $firemen = $this->daoPompier->findAll();
                $pageFireman = Renderer::render('fireman.php', compact('firemen'));
                echo $pageFireman;

            }
            
        }





        /**
         * Function which display firemanCreate.php
         */
        public function add() : void {

            $pageFiremanCreate = Renderer::render('firemanCreate.php');
            echo $pageFiremanCreate;

        }





        /**
         * Function which insert a new fireman to database
         */
        public function insert() {

            $filter = new Filter($_POST);

            $filter->acceptVisitor('matriculeInput', new MatriculeVisitor());
            $filter->acceptVisitor('firstNameInput', new FirstNameVisitor());
            $filter->acceptVisitor('lastNameInput', new LastNameVisitor());
            $filter->acceptVisitor('chefAgretInput', new ChefAgretVisitor());
            $filter->acceptVisitor('birthDateInput', new BirthDateVisitor());
            $filter->acceptVisitor('numberBarrackInput', new BarrackNumberVisitor());
            $filter->acceptVisitor('gradeInput', new GradeCodeVisitor());
            $filter->acceptVisitor('matriculeManagerInput', new MatriculeManagerVisitor());

            $tableCheck = $filter->visit();

            $countValidity = 0;

            //Check if everything is correct
            foreach($tableCheck as $key => $value) {

                if($tableCheck[$key] == true) { $countValidity = $countValidity + 1; }

            }


            if($countValidity == count($tableCheck)) {

                $fireman = new Fireman(
                    htmlspecialchars($_POST['matriculeInput']),
                    htmlspecialchars($_POST['firstNameInput']),
                    htmlspecialchars($_POST['lastNameInput']),
                    htmlspecialchars($_POST['chefAgretInput']),
                    htmlspecialchars($_POST['birthDateInput']),
                    htmlspecialchars($_POST['numberBarrackInput']),
                    htmlspecialchars($_POST['gradeInput']),
                    htmlspecialchars($_POST['matriculeManagerInput'])
                );

                try {

                    $success = $this->daoPompier->createFireman($fireman);
    
                } catch (\Exception $error) {}

                //First case : if the request worked correctly ==> we redirect to fireman.php with a success flash message
                if ($success != 0) {

                    $_SESSION['result'] = "The fireman has been added to the database !";
                    $_SESSION['color'] = "green";
                    header('Location: ../fireman/display');

                }
                
                //Second case : if the request didn't work correctly ==> we redirect to fireman.php with an error flash message
                else {

                    $_SESSION['result'] = "Oopsi... It seems like the fireman hasn't been added correctly to the database !";
                    $_SESSION['color'] = "red";
                    header('Location: ../fireman/display');

                }

            } else {

                header('Location: ../fireman/create');

            }

        }





        /**
         * Function which modify an existing fireman already stored in the database
         */
        public function alter() {

            $filter = new Filter($_POST);

            $filter->acceptVisitor('matriculeInput', new MatriculeVisitor());
            $filter->acceptVisitor('firstNameInput', new FirstNameVisitor());
            $filter->acceptVisitor('lastNameInput', new LastNameVisitor());
            $filter->acceptVisitor('chefAgretInput', new ChefAgretVisitor());
            $filter->acceptVisitor('birthDateInput', new BirthDateVisitor());
            $filter->acceptVisitor('numberBarrackInput', new BarrackNumberVisitor());
            $filter->acceptVisitor('gradeInput', new GradeCodeVisitor());
            $filter->acceptVisitor('matriculeManagerInput', new MatriculeManagerVisitor());

            $tableCheck = $filter->visit();

            $countValidity = 0;


            //Check if everything is correct
            foreach($tableCheck as $key => $value) {

                if($tableCheck[$key] == true) { $countValidity = $countValidity + 1; }

            }

            
            if($countValidity == count($tableCheck)) {

                $fireman = new Fireman(
                    htmlspecialchars($_POST['matriculeInput']),
                    htmlspecialchars($_POST['firstNameInput']),
                    htmlspecialchars($_POST['lastNameInput']),
                    htmlspecialchars($_POST['chefAgretInput']),
                    htmlspecialchars($_POST['birthDateInput']),
                    htmlspecialchars($_POST['numberBarrackInput']),
                    htmlspecialchars($_POST['gradeInput']),
                    htmlspecialchars($_POST['matriculeManagerInput'])
                );

                try {

                    $success = $this->daoPompier->updateFireman($fireman);
    
                } catch (\Exception $error) {}


                //First case : if the request worked correctly ==> we redirect to fireman.php with a success flash message
                if ($success != 0) {

                    $_SESSION['result'] = "The fireman has been correctly updated in the database !";
                    $_SESSION['color'] = "green";
                    header('Location: ../fireman/display');

                } 
                
                //Second case : if the request didn't work correctly ==> we redirect to fireman.php with an error flash message
                else {

                    $_SESSION['result'] = "Oopsi... It seems like the fireman hasn't been updated correctly in the database !";
                    $_SESSION['color'] = "red";
                    header('Location: ../fireman/display');

                }

            } else {

                header('Location: ../fireman/modify/'.$_POST['matriculeInput']);

            }

        }





        /**
         * Function which retrieves information about a specific fireman using the fragments
         * 
         * @param string $fragments
         */
        public function update($fragments) {

            $fireman = $this->daoPompier->retrieveFireman($fragments);
            $pageFiremanModify = Renderer::render('firemanModify.php', compact('fragments','fireman'));
            echo $pageFiremanModify;
        
        }





        /**
         * Function which deletes a specific fireman from the database using the fragments
         * 
         * @param string $fragments
         */
        public function delete() : void{

            try {

                $success = $this->daoPompier->removeFireman(htmlspecialchars($_POST["matriculeToDelete"]));

            } catch (\Exception $error) {}

            //First case : if the request worked correctly ==> we redirect to fireman.php with a success flash message
            if ($success != 0) {

                $_SESSION['result'] = "The fireman has been deleted correctly from the database !";
                $_SESSION['color'] = "green";
                header('Location: ../fireman/display');

            }
            
            //Second case : if the request didn't worked correctly ==> we redirect to fireman.php with an error flash message
            else {

                $_SESSION['result'] = "Oopsi... It seems like the fireman hasn't been deleted correctly from the database !";
                $_SESSION['color'] = "red";
                header('Location: ../fireman/display');

            }

        }

    }

?>