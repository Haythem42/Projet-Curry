<?php

namespace app\controllers;

class TypeNumberVisitor extends AbstractVisitor {


    /**
     * Function which will check the barrack's number passed through html forms.
     * 
     * @param string $typeNumber
     * @return bool
     */
    public function checkDataValidity($type) :bool {

        if ( $this->checkNumber($type) == true && $this->checkLength($type) == true && $this->checkLetter($type) == true ) { return true; }
        else { return false; }

    }



    /**
     * Function which check if the type is a number
     * 
     * @param string $typeNumber
     * @return bool
     */
    public function checkNumber($typeNumber) : bool {

        if( is_numeric($typeNumber) ) { return true; }
        else { return false; }

    }


    
    /**
     * Function which check if the type number length
     * 
     * @param string $typeNumber
     * @return bool
     */
    public function checkLength($typeNumber) : bool {

        if ( strlen($typeNumber) == 1 ) { return true; }
        else { return false; }

    }



    /**
     * Function which check if the type number contains letters
     * 
     * @param string $typeNumber
     * @return bool
     */
    public function checkLetter($typeNumber) : bool {

        if ( preg_match('/[a-zA-Z ]/', $typeNumber) ) { return false; }
        else { return true; }

    }
}