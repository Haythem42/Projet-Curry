<?php

/**
* Description of caserne
*
* @author Haythem
*/

namespace app\models;

class DAOCaserne {

    private $cnx;

    public function __contrusct($connect){

    }

    //? veut dire qu'il ne peut rien retourner (NULL)
    public function find($id) : ?Caserne {

    }

    public function save(Caserne $caserne) : void {

    }

    public function update(Caserne $caserne) : void {
        
    }

    public function remove(Caserne $caserne) : void {
        
    }

    /**
     * @param int $offset
     * @param int $limit
     * @return array<Caserne>
    */
    public function findALl($offset=0, $limit=10) : Array {

    }

    /**
     * Retrieve number of FireHouse in DB
     * @return int
    */
    public function count() : int {

    }

    public function findFireMenFromFireHouse(Caserne $caserne) : ?Caserne {

    }
}