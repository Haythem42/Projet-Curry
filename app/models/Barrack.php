<?php

/**
* Description of casernes
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
     * Construct of Barrack
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
        return $this->NumCaserne;
    }

    public function getAdresse(){
        return $this->Adresse;
    }

    public function getCP(){
        return $this->CP;
    }

    public function getVille(){
        return $this->Ville;
    }

    public function getCodeTypeC(){
        return $this->CodeTypeC;
    }

    /* ---------- SET functions ---------- */

    public function setNumCaserne($NumCaserne){
        $this->NumCaserne = $NumCaserne;
        return $this;
    }

    public function setAdresse($Adresse){
        $this->Adresse = $Adresse;
        return $this;
    }

    public function setCP($CP){
        $this->CP = $CP;
        return $this;
    }

    public function setVille($Ville){
        $this->Ville = $Ville;
        return $this;
    }

    public function setCodeTypeC($CodeTypeC){
        $this->CodeTypeC = $CodeTypeC;
        return $this;
    }

}