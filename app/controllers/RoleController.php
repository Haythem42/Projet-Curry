<?php

namespace app\controllers;

use app\models\DAORole;
use app\utils\Renderer;
use app\utils\SingletonDBMaria;
use app\models\Role;


/**
 * Description of RoleController class
 * 
 * @author Haythem
 */
class RoleController extends BaseController {

    private DAORole $daoRole;

    /**
     * Constructor of RoleController class
     */
    public function __construct() {

        //initialisation du DAO ...
        $this->daoRole = new DAORole(SingletonDBMaria::getInstance()->getConnection());

    }


    /**
     * Function which displays the list of all roles
     * 
     * @param string $fragments
     */
    public function show($fragments = null){ //READ du CRUD, Méthode GET du protocole HTTP

        $roleList = $this->daoRole->findAll();

        $pageRole = Renderer::render('roleList.php', compact('roleList'));
        echo $pageRole;

    }



    /**
     * Function which insert into the database the new role after datas have been filtered
     */
    public function insert() : void {

        // We filter all input datas and check if all is good
        $filter = new Filter($_POST);

        $filter->acceptVisitor('role', new RoleNameVisitor());
        $filter->acceptVisitor('boxF1', new CheckboxVisitor());
        $filter->acceptVisitor('boxF2', new CheckboxVisitor());
        $filter->acceptVisitor('boxF3', new CheckboxVisitor());
        $filter->acceptVisitor('boxF4', new CheckboxVisitor());
        $filter->acceptVisitor('boxB1', new CheckboxVisitor());
        $filter->acceptVisitor('boxB2', new CheckboxVisitor());
        $filter->acceptVisitor('boxB3', new CheckboxVisitor());
        $filter->acceptVisitor('boxB4', new CheckboxVisitor());
        $filter->acceptVisitor('boxU1', new CheckboxVisitor());
        $filter->acceptVisitor('boxU2', new CheckboxVisitor());
        $filter->acceptVisitor('boxU3', new CheckboxVisitor());
        $filter->acceptVisitor('boxU4', new CheckboxVisitor());
        $filter->acceptVisitor('boxR1', new CheckboxVisitor());
        $filter->acceptVisitor('boxR2', new CheckboxVisitor());
        $filter->acceptVisitor('boxR3', new CheckboxVisitor());
        $filter->acceptVisitor('boxR4', new CheckboxVisitor());

        $tableCheck = $filter->visit();

        $countValidity = 0;

        //Check if everything is correct
        foreach ( $tableCheck as $key => $value ) {

            if ( $tableCheck[$key] == true ) { 

                $countValidity = $countValidity + 1; 

            }

        }


        if ( $countValidity == count($tableCheck) ) {
        
            $binaryString = "";

            // Convert to binary
            foreach ( $_POST as $key => $value ) {

                if ( $value == "Y" ) { 

                    $binaryString  = $binaryString."1";

                }
                if ( $value == "N" ) {

                    $binaryString  = $binaryString."0";

                }

            }


            $role = new Role (

                0,
                htmlspecialchars($_POST['role']),
                htmlspecialchars(bindec(strrev($binaryString)))

            );

            try {

                $success = $this->daoRole->save($role);

            } catch (\Exception $error) {}


            if ( $success != 0 ) {

                $_SESSION['result'] = "The role has been added to the database !";
                $_SESSION['color'] = "green";

                header('Location: ../role/display');

            } else {

                $_SESSION['result'] = "Oopsi... Check if a user already exist !";
                $_SESSION['color'] = "red";

                header('Location: ../role/display');

            }

        
        } else {

            $_SESSION['filterMessage'] = "Oopsi... The data were not validated by the filter !";
            $_SESSION['color'] = "red";

            header('Location: ../role/display');

        }


    }


    /**
     * Function which modify data(s) of the database by new information after datas have been filtered
     */
    public function alter() {

        // We filter all input datas and check if all is good
        $filter = new Filter($_POST);

        $filter->acceptVisitor('idModified', new RoleIdVisitor());
        $filter->acceptVisitor('roleModified', new RoleNameVisitor());
        $filter->acceptVisitor('boxModifiedInputF1', new CheckboxVisitor());
        $filter->acceptVisitor('boxModifiedInputF2', new CheckboxVisitor());
        $filter->acceptVisitor('boxModifiedInputF3', new CheckboxVisitor());
        $filter->acceptVisitor('boxModifiedInputF4', new CheckboxVisitor());
        $filter->acceptVisitor('boxModifiedInputB1', new CheckboxVisitor());
        $filter->acceptVisitor('boxModifiedInputB2', new CheckboxVisitor());
        $filter->acceptVisitor('boxModifiedInputB3', new CheckboxVisitor());
        $filter->acceptVisitor('boxModifiedInputB4', new CheckboxVisitor());
        $filter->acceptVisitor('boxModifiedInputU1', new CheckboxVisitor());
        $filter->acceptVisitor('boxModifiedInputU2', new CheckboxVisitor());
        $filter->acceptVisitor('boxModifiedInputU3', new CheckboxVisitor());
        $filter->acceptVisitor('boxModifiedInputU4', new CheckboxVisitor());
        $filter->acceptVisitor('boxModifiedInputR1', new CheckboxVisitor());
        $filter->acceptVisitor('boxModifiedInputR2', new CheckboxVisitor());
        $filter->acceptVisitor('boxModifiedInputR3', new CheckboxVisitor());
        $filter->acceptVisitor('boxModifiedInputR4', new CheckboxVisitor());

        $tableCheck = $filter->visit();

        $countValidity = 0;

        //Check if everything is correct
        foreach ( $tableCheck as $key => $value ) {

            if ( $tableCheck[$key] == true ) { 
                
                $countValidity = $countValidity + 1; 
            
            }

        }


        if ( $countValidity == count($tableCheck) ) {
        
            $binaryString = "";

            // Convert to binary
            foreach ( $_POST as $key => $value ) {

                if ( $value == "Y" ) { 

                    $binaryString  = $binaryString."1";

                }
                if ( $value == "N" ) {

                    $binaryString  = $binaryString."0";

                }

            }


            $role = new Role (

                htmlspecialchars($_POST['idModified']),
                htmlspecialchars($_POST['roleModified']),
                htmlspecialchars(bindec(strrev($binaryString)))

            );


            try {

                $success = $this->daoRole->update($role);

            } catch (\Exception $error) {}

            if ( $success != 0 ) {

                $_SESSION['result'] = "The role has been modified in the database !";
                $_SESSION['color'] = "green";

                header('Location: ../role/display');

            } else {

                $_SESSION['result'] = "Oopsi... Check before if you have modified something about the user !";
                $_SESSION['color'] = "red";

                header('Location: ../role/display');

            }

        
        } else {

            $_SESSION['filterMessage'] = "Oopsi... The data were not validated by the filter !";
            $_SESSION['color'] = "red";

            header('Location: ../role/display');

        }

    
    }


    
    /**
     * Function which displays the error404 page.
     */
    public function error404() : void {

        $error404Page = Renderer::render('error404.php');
        echo $error404Page;

    }



    /**
     * Function which displays the error403 page.
     */
    public function error403() : void {

        $error403Page = Renderer::render('error403.php');
        echo $error403Page;

    }


    /**
     * Function which delete a role
     */
    public function erase() : void {

        try {

            $success = $this->daoRole->remove(htmlspecialchars($_POST["roleDelete"]));

        } catch (\Exception $error) {}

        //First case : if the request worked correctly ==> we redirect to roleList.php with a success flash message
        if ( $success != 0 ) {

            $_SESSION['result'] = "The role has been deleted correctly from the database !";
            $_SESSION['color'] = "green";

            header('Location: ../role/display');

        }
        
        //Second case : if the request didn't worked correctly ==> we redirect to roleList.php with an error flash message
        else {

            $_SESSION['result'] = "Oopsi... Check before if users have this role (You can't delete it if users have it) !";
            $_SESSION['color'] = "red";

            header('Location: ../role/display');

        }

    }
}