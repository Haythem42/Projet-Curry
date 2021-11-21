<?php

namespace app\controllers;

use app\models\DAOBarrack;
use app\utils\Renderer;
use app\utils\SingletonDBMaria;
use app\models\Barrack;
use app\models\Fireman;


/**
 * Description of BarrackController class
 * 
 * @author Haythem
 */
class BarrackController extends BaseController {

    private DAOBarrack $daoBarrack;

    /**
     * Constructor of BarrackController class
     */
    public function __construct() {
        
        //initialisation du DAO ...
        $this->daoBarrack = new DAOBarrack(SingletonDBMaria::getInstance()->getConnection());
    }


    /**
     * Function which displays the list of all barracks
     * 
     * @param string $fragments
     */
    public function show($fragments = null){ //READ du CRUD, Méthode GET du protocole HTTP


        if ( isset($fragments) ) {

            $listBarrack = $this->daoBarrack->findAllBarracks((intval($fragments)*10)-10,10);

            $pageBarrack = Renderer::render('listBarrack.php', compact('listBarrack'));
            echo $pageBarrack;

        } else {

            $listBarrack = $this->daoBarrack->findAll();

            $pageBarrack = Renderer::render('listBarrack.php', compact('listBarrack'));
            echo $pageBarrack;

        }
    }

    /**
     * Function which displays more information about a barrack (one barrack)
     * 
     * @param int $fragments
     */
    public function visualize($fragments) {

        $barrack = $this->daoBarrack->find($fragments);

        $firemen = $this->daoBarrack->findFireMenFromBarrack($barrack);

        $countFireman = $this->daoBarrack->count($firemen);
        
        $pageBarrack = Renderer::render('barrackDisplay.php', compact('barrack', 'countFireman'));
        echo $pageBarrack;

    } 


    /**
     * Function which display the create page "barrackCreate.php"
     */
    public function add() : void {

        $pageCreateBarrack = Renderer::render('barrackCreate.php');
        echo $pageCreateBarrack;

    }


    /**
     * Function which insert into the database the new barrack after datas have been filtered
     */
    public function insert() : void { //CREATE du CRUD, Méthode PUT du protocole HTTP

        // We filter all input datas and check if all is good
        $filter = new Filter($_POST);

        $filter->acceptVisitor('numCaserne', new BarrackNumberVisitor());
        $filter->acceptVisitor('adresseCaserne', new AddressVisitor());
        $filter->acceptVisitor('CP', new PostalVisitor());
        $filter->acceptVisitor('ville', new CityVisitor());
        $filter->acceptVisitor('codeTypeC', new TypeNumberVisitor());

        $verify = $filter->visit();

        $counter = 0;

        //Check if everything is correct
        foreach( $verify as $key => $value ) {

            if ( $verify[$key] == true ) {

                $counter += 1;

            }

        }

        if ( count($verify) === $counter ) {

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
            if ( $success != 0 ) {

                $_SESSION['message'] = "The barrack has been correctly created in the database !";
                $_SESSION['color'] = "green";

                header('Location: /barrack/display');

            }

            
            //Second case : if the request didn't work correctly ==> we redirect to listBarrack.php with an error flash message
            else {

                $_SESSION['message'] = "Oopsi... Something went wrong (a barrack with the same id already exists) !";
                $_SESSION['color'] = "red";

                header('Location: /barrack/display');

            }


        } else {

            $_SESSION['filterMessage'] = "Oopsi... The data were not validated by the filter !";
            $_SESSION['color'] = "red";

            header('Location: /barrack/create');

        }
    }



    /**
     * Function which modify data(s) of the database by new information after datas have been filtered
     */
    public function alter() {

        // We filter all input datas and check if all is good
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

        if ( count($verify) == $counter ) {


            $modifyBarrack = new Barrack (   

                htmlspecialchars($_POST['numBarrack']),
                htmlspecialchars($_POST['adresseCaserne']),
                htmlspecialchars($_POST['CP']), 
                htmlspecialchars($_POST['ville']), 
                htmlspecialchars($_POST['codeTypeC'])
            
            );
        

            try {

                $success = $this->daoBarrack->update($modifyBarrack);

            } catch (\Exception $error) {}

             //First case : if the request worked correctly ==> we redirect to listBarrack.php with a success flash message
            if ($success != 0) {

                $_SESSION['message'] = "The barrack has been correctly updated in the database !";
                $_SESSION['color'] = "green";

                header('Location: /barrack/display');

            }
        
            //Second case : if the request didn't work correctly ==> we redirect to listBarrack.php with an error flash message
            else {

                $_SESSION['message'] = "Oopsi... Something went wrong (be sure to modify one propertie before clicking on confirm) !";
                $_SESSION['color'] = "red";

                header('Location: /barrack/display');

            }
            
        
        } 
        
        else {

            $_SESSION['filterMessage'] = "Oopsi... The data were not validated by the filter !";
            $_SESSION['color'] = "red";

            header('Location: /barrack/modify/'.$_POST['numBarrack']);

        }


    }


    /**
     * Function which display the update page "barrackModify.php"
     * 
     * @param int $fragments
     */
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



    /**
     * Function which delete a barrack
     */
    public function delete($fragments) : void { //DELETE du CRUD, Méthode PUT du protocole HTTP

        try {

            $deleteBarrack = $this->daoBarrack->remove($fragments);

        } catch (\Exception $error) {}

        //First case : if the request worked correctly ==> we redirect to listBarrack.php with a success flash message
        if ($deleteBarrack != 0) {


            $_SESSION['message'] = "The barrack has been correctly deleted from the database !";
            $_SESSION['color'] = "green";

            header('Location: /barrack/display');

        }
        
        //Second case : if the request didn't work correctly ==> we redirect to listBarrack.php with an error flash message
        else {

            $_SESSION['message'] = "Oopsi... Something went wrong (check if there is any relations with other tables in the DB) !";
            $_SESSION['color'] = "green";
            
            header('Location: /barrack/display');

        }
    }
}