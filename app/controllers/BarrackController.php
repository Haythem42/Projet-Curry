<?php

namespace app\controllers;

use app\models\DAOBarrack;
use app\utils\Renderer;
use app\utils\SingletonDBMaria;


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


    public function insert() : void { //CREATE du CRUD, Méthode PUT du protocole HTTP
        //CF PSR-7
        //Il faut penser à filtrer les données (faille XSS) et vérifier les validités
        //Il faut se protéger des failles CSRF
        //Il faut penser à la sécurité
        //Gestion des erreurs PDO ou autres ...
        $listBarrack = $this->daoBarrack->save();

    }


    public function update() : void { //UPDATE du CRUD, Méthode PUT du protocole HTTP
        //CF PSR-7
        //Il faut penser à filtrer les données (faille XSS) et vérifier les validités
        //Il faut se protéger des failles CSRF
        //Il faut penser à la sécurité
        //Gestion des erreurs PDO ou autres ...
    }


    public function delete() : void { //DELETE du CRUD, Méthode PUT du protocole HTTP
        //CF PSR-7
        //Il faut penser à filtrer les données (faille XSS) et vérifier les validités
        //Il faut se protéger des failles CSRF
        //Il faut penser à la sécurité
        //Gestion des erreurs PDO ou autres ...
    }


    public function showDetail(string $id) : void { 
        //Il faut penser à la sécurité
        //Gestion des erreurs PDO ou autres ...
    }
}