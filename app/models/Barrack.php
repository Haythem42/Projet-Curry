<?php

/**
* Description of caserne
* 
* @author Haythem
*/

namespace app\models;

class Barrack {

    private $NumCaserne;
    private $Adresse;
    private $CP;
    private $Ville;
    private $CodeTypeC;

    /**
     * Construct of FireHouse
     * 
     * @param int $numCaserne
     * @param string $adresse
     * @param string $cp
     * @param string $ville
     * @param string $codeTypeC
    */

    public function __construct($numCaserne, $adresse, $cp, $ville, $codeTypeC){

        $this->NumCaserne = $numCaserne;
        $this->Adresse = $adresse;
        $this->CP = $cp;
        $this->Ville = $ville;
        $this->CodeTypeC = $codeTypeC;

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