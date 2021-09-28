<?php

/**
* Description of caserne
* 
* @author Haythem
*/

namespace app\models;

class Barrack {
    private $numCaserne;
    private $adresse;
    private $cp;
    private $ville;
    private $codeTypeC;

    /**
     * Construct of FireHouse
     * 
     * @param int $numCaserne
     * @param string $adresse
     * @param string $cp
     * @param string $ville
     * @param string $codeTypeC
    */
    public function __contrusct($numCaserne, $adresse, $cp, $ville, $codeTypeC){
        $this->numCaserne = $numCaserne;
        $this->adresse = $adresse;
        $this->cp = $cp;
        $this->ville = $ville;
        $this->codeTypeC = $codeTypeC;
    }

    /* ---------- GET functions ---------- */

    public function getNumCaserne(){
        return $this->numCaserne;
    }

    public function getAdresse(){
        return $this->adresse;
    }

    public function getCP(){
        return $this->cp;
    }

    public function getVille(){
        return $this->ville;
    }

    public function getCodeTypeC(){
        return $this->codeTypeC;
    }

}