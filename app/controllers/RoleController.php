<?php

namespace app\controllers;

use app\models\DAORole;
use app\utils\Renderer;
use app\utils\SingletonDBMaria;
use app\models\Role;


/**
 * Description of RoleController class
 * @author haythem
 */
class RoleController extends BaseController {

    private DAORole $daoRole;

    public function __construct() {
        //initialisation du DAO ...
        $this->daoRole = new DAORole(SingletonDBMaria::getInstance()->getConnection());
    }


    public function show($fragments = null){ //READ du CRUD, Méthode GET du protocole HTTP
        //Il faut penser à la sécurité
        //Gestion des erreurs PDO ou autres ...

        $roleList = $this->daoRole->findAll();
        $pageRole = Renderer::render('roleList.php', compact('roleList'));
        echo $pageRole;

        
    }


    public function add() : void {

        $pageCreateRole = Renderer::render('roleCreate.php');
        echo $pageCreateRole;

    }


    public function insert() : void { //CREATE du CRUD, Méthode PUT du protocole HTTP
        //CF PSR-7
        //Il faut penser à filtrer les données (faille XSS) et vérifier les validités
        //Il faut se protéger des failles CSRF
        //Il faut penser à la sécurité
        //Gestion des erreurs PDO ou autres ...

        $role = new Role($_POST['id'], $_POST['libelle']);
        
        $newRole = $this->daoRole->save($role);

        //First case : if the request worked correctly ==> we redirect to roleList.php with a success flash message
        if ($newRole != 0) {

            header('Location: ../role/display');

        }
        
        //Second case : if the request didn't work correctly ==> we redirect to roleList.php with an error flash message
        else {

            header('Location: ../role/display');

        }


    }


    public function alter() {


        $modifyRole = new Role($_POST['id'], $_POST['libelle']);

        $updateRole = $this->daoRole->update($modifyRole);

        //First case : if the request worked correctly ==> we redirect to roleList.php with a success flash message
        if ($updateRole != 0) {

            header('Location: ../role/display');

        }
        
        //Second case : if the request didn't work correctly ==> we redirect to roleList.php with an error flash message
        else {

            header('Location: ../role/display');

        }


    }



    public function update($fragments) : void { //UPDATE du CRUD, Méthode PUT du protocole HTTP
        //CF PSR-7
        //Il faut penser à filtrer les données (faille XSS) et vérifier les validités
        //Il faut se protéger des failles CSRF
        //Il faut penser à la sécurité
        //Gestion des erreurs PDO ou autres ...


        $role = $this->daoRole->find($fragments);
        $roleToUpdate = Renderer::render('roleModify.php', compact('role'));
        echo $roleToUpdate;
        
    }

    
    public function error() : void {

        $errorPage = Renderer::render('error404.php');
        echo $errorPage;

    }


    public function delete($fragments) : void { //DELETE du CRUD, Méthode PUT du protocole HTTP
        //CF PSR-7
        //Il faut penser à filtrer les données (faille XSS) et vérifier les validités
        //Il faut se protéger des failles CSRF
        //Il faut penser à la sécurité
        //Gestion des erreurs PDO ou autres ..


        $deleteRole = $this->daoRole->remove($fragments);

        //First case : if the request worked correctly ==> we redirect to roleList.php with a success flash message
        if ($deleteRole != 0) {

            header('Location: ../display');

        }
        
        //Second case : if the request didn't work correctly ==> we redirect to roleList.php with an error flash message
        else {

            header('Location: ../display');

        }

    }


    public function showDetail(string $id) : void { 
        //Il faut penser à la sécurité
        //Gestion des erreurs PDO ou autres ...
    }
}