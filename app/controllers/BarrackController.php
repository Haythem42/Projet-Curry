<?php

namespace app\controllers;

use app\models\DAOBarrack;
use app\utils\Renderer;
use app\utils\SingletonDBMaria;
use app\models\Barrack;
use app\models\Fireman;


/**
 * Description of BarrackController class
 * @author haythem
 */
class BarrackController extends BaseController {

    private DAOBarrack $daoBarrack;

    public function __construct() {
        //initialisation du DAO ...
        $this->daoBarrack = new DAOBarrack(SingletonDBMaria::getInstance()->getConnection());
    }



    public function show($fragments = null){ //READ du CRUD, Méthode GET du protocole HTTP


        if (isset($fragments)) {

            $listBarrack = $this->daoBarrack->findAllBarracks((intval($fragments)*10)-10,10);
            $pageBarrack = Renderer::render('listBarrack.php', compact('listBarrack'));
            echo $pageBarrack;

        } else {

            $listBarrack = $this->daoBarrack->findAll();
            $pageBarrack = Renderer::render('listBarrack.php', compact('listBarrack'));
            echo $pageBarrack;

        }
    }

    public function visualize($fragments) {

        $barrack = $this->daoBarrack->find($fragments);
        $firemen = $this->daoBarrack->findFireMenFromBarrack($barrack);
        $countFireman = $this->daoBarrack->count($firemen);
        $pageBarrack = Renderer::render('barrackDisplay.php', compact('barrack', 'countFireman'));
        echo $pageBarrack;

    } 


    public function poster() {

        // $displayBarrack = new Barrack($_POST['numCaserne'], $_POST['adresseCaserne'], $_POST['CP'], $_POST['ville'], $_POST['codeTypeC'],);
        // $displayFireman = new Fireman($_POST(''))

    }


    public function add() : void {

        $pageCreateBarrack = Renderer::render('barrackCreate.php');
        echo $pageCreateBarrack;

    }


    public function insert() : void { //CREATE du CRUD, Méthode PUT du protocole HTTP

        $filter = new Filter($_POST);

        $filter->acceptVisitor('numCaserne', new BarrackNumberVisitor());
        $filter->acceptVisitor('adresseCaserne', new AddressVisitor());
        $filter->acceptVisitor('CP', new PostalVisitor());
        $filter->acceptVisitor('ville', new CityVisitor());
        $filter->acceptVisitor('codeTypeC', new TypeNumberVisitor());

        $verify = $filter->visit();

        $counter = 0;

        foreach( $verify as $key => $value ) {

            if ( $verify[$key] == true ) {

                $counter += 1;

            }

        }

        if (count($verify) === $counter) {

            $createdBarrack = new Barrack (
                htmlspecialchars($_POST['numCaserne']),
                htmlspecialchars($_POST['adresseCaserne']),
                htmlspecialchars($_POST['CP']),
                htmlspecialchars($_POST['ville']),
                htmlspecialchars($_POST['codeTypeC'])

            );

            try {

                $success = $this->daoBarrack->save($createdBarrack);

            } catch (\Exception $error) {}


            //First case : if the request worked correctly ==> we redirect to listBarrack.php with a success flash message
            if ($success != 0) {

                $_SESSION['message'] = "The barrack has been correctly created in the database !";
                $_SESSION['color'] = "green";
                header('Location: ../barrack/display');

            }

            
            //Second case : if the request didn't work correctly ==> we redirect to listBarrack.php with an error flash message
            else {

                $_SESSION['message'] = "Oopsi... It seems like the barrack hasn't been created correctly in the database !";
                $_SESSION['color'] = "red";
                header('Location: ../barrack/display');

            }


        } else {


            $_SESSION['filterMessage'] = "Oopsi... The data were not validated by the filter !";
            $_SESSION['color'] = "red";
            header('Location: ../barrack/create');

        }
    }



    public function alter() {

        $filter = new Filter($_POST);

        $filter->acceptVisitor('numBarrack', new BarrackNumberVisitor());
        $filter->acceptVisitor('adresseCaserne', new AddressVisitor());
        $filter->acceptVisitor('CP', new PostalVisitor());
        $filter->acceptVisitor('ville', new CityVisitor());
        $filter->acceptVisitor('codeTypeC', new TypeNumberVisitor());

        $verify = $filter->visit();

        $counter = 0;

        foreach( $verify as $key => $value ) {

            if ( $verify[$key] == true ) {

                $counter += 1;

            }

        }

        if (count($verify) == $counter ) {


            $modifyBarrack = new Barrack(   htmlspecialchars($_POST['numBarrack']),
                                            htmlspecialchars($_POST['adresseCaserne']),
                                            htmlspecialchars($_POST['CP']), 
                                            htmlspecialchars($_POST['ville']), 
                                            htmlspecialchars($_POST['codeTypeC']));
        

            try {

                $success = $this->daoBarrack->update($modifyBarrack);

            } catch (\Exception $error) {}

             //First case : if the request worked correctly ==> we redirect to listBarrack.php with a success flash message
            if ($success != 0) {

                $_SESSION['message'] = "The barrack has been correctly updated in the database !";
                $_SESSION['color'] = "green";
                header('Location: ../display');

            }
        
            //Second case : if the request didn't work correctly ==> we redirect to listBarrack.php with an error flash message
            else {

                $_SESSION['message'] = "Oopsi... It seems like the barrack hasn't been updated correctly in the database !";
                $_SESSION['color'] = "red";
                header('Location: ../../barrack/display');

            }
            
        
        } 
        
        else {

            $_SESSION['messageFilter'] = "Oopsi... The data were not validated by the filter !";
            $_SESSION['color'] = "red";
            header('Location: ../../barrack/display');

        }


    }



    public function update($fragments) : void { //UPDATE du CRUD, Méthode PUT du protocole HTTP


        $barrack = $this->daoBarrack->find($fragments);
        $barrackToUpdate = Renderer::render('barrackModify.php', compact('barrack'));
        echo $barrackToUpdate;
        
    }

    
    /**
     * Function which displays the 404 error page.
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


    public function delete($fragments) : void { //DELETE du CRUD, Méthode PUT du protocole HTTP

        try {

            $deleteBarrack = $this->daoBarrack->remove($fragments);

        } catch (\Exception $error) {}

        //First case : if the request worked correctly ==> we redirect to listBarrack.php with a success flash message
        if ($deleteBarrack != 0) {


            $_SESSION['message'] = "The barrack has been correctly deleted from the database !";
            $_SESSION['color'] = "green";
            header('Location: ../display');

        }
        
        //Second case : if the request didn't work correctly ==> we redirect to listBarrack.php with an error flash message
        else {

            $_SESSION['message'] = "TOopsi... It seems like the barrack hasn't been deleted correctly from the database !";
            $_SESSION['color'] = "green";
            header('Location: ../display');

        }
    }
}