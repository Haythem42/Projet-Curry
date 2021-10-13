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


    //Renvoie la page avec la liste de tous les pompiers
    //Avec la pagination
    // public function show($offset, $limit){ //READ du CRUD, Méthode GET du protocole HTTP
    //     //Il faut penser à la sécurité
    //     //Gestion des erreurs PDO ou autres ...
    //     $listBarrack = $this->daoBarrack->findAll($offset, $limit);
    //     $page = Renderer::render('listBarrack.php', compact('listBarrack'));
    //     echo $page;
    // }


    public function show($fragments = null){ //READ du CRUD, Méthode GET du protocole HTTP
        //Il faut penser à la sécurité
        //Gestion des erreurs PDO ou autres ...

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
        //CF PSR-7
        //Il faut penser à filtrer les données (faille XSS) et vérifier les validités
        //Il faut se protéger des failles CSRF
        //Il faut penser à la sécurité
        //Gestion des erreurs PDO ou autres ...

        $barrack = new Barrack($_POST['numCaserne'], $_POST['adresseCaserne'], $_POST['CP'], $_POST['ville'], $_POST['codeTypeC'],);
        
        $newBarrack = $this->daoBarrack->save($barrack);

        //First case : if the request worked correctly ==> we redirect to listBarrack.php with a success flash message
        if ($newBarrack != 0) {

            header('Location: ../barrack/display');

        }
        
        //Second case : if the request didn't work correctly ==> we redirect to listBarrack.php with an error flash message
        else {

            header('Location: ../barrack/display');

        }


    }


    public function alter() {


        $modifyBarrack = new Barrack($_POST['numCaserne'], $_POST['adresseCaserne'], $_POST['CP'], $_POST['ville'], $_POST['codeTypeC'],);

        $updateBarrack = $this->daoBarrack->update($modifyBarrack);

        //First case : if the request worked correctly ==> we redirect to listBarrack.php with a success flash message
        if ($updateBarrack != 0) {

            header('Location: ../barrack/display');

        }
        
        //Second case : if the request didn't work correctly ==> we redirect to listBarrack.php with an error flash message
        else {

            header('Location: ../barrack/display');

        }


    }



    public function update($fragments) : void { //UPDATE du CRUD, Méthode PUT du protocole HTTP
        //CF PSR-7
        //Il faut penser à filtrer les données (faille XSS) et vérifier les validités
        //Il faut se protéger des failles CSRF
        //Il faut penser à la sécurité
        //Gestion des erreurs PDO ou autres ...


        $barrack = $this->daoBarrack->find($fragments);
        $barrackToUpdate = Renderer::render('barrackModify.php', compact('barrack'));
        echo $barrackToUpdate;
        
    }


    public function delete($fragments) : void { //DELETE du CRUD, Méthode PUT du protocole HTTP
        //CF PSR-7
        //Il faut penser à filtrer les données (faille XSS) et vérifier les validités
        //Il faut se protéger des failles CSRF
        //Il faut penser à la sécurité
        //Gestion des erreurs PDO ou autres ..


        $deleteBarrack = $this->daoBarrack->remove($fragments);

        //First case : if the request worked correctly ==> we redirect to listBarrack.php with a success flash message
        if ($deleteBarrack != 0) {

            header('Location: ../display');

        }
        
        //Second case : if the request didn't work correctly ==> we redirect to listBarrack.php with an error flash message
        else {

            header('Location: ../display');

        }

    }


    public function showDetail(string $id) : void { 
        //Il faut penser à la sécurité
        //Gestion des erreurs PDO ou autres ...
    }
}