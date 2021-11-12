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

        if ( $this->checkNumber($type) == true && $this->checkLength($type) == true && $this->checkLetter($type) == true ) {return true;}
        else {return false;}

    }



    /**
     * Function which check if the type is a number
     * 
     * @param string $type
     * @return bool
     */
    public function checkNumber($type) : bool {

        if( is_numeric($type) ) {return true;}
        else {return false;}

    }


    
    /**
     * Function which check if the type number length
     * 
     * @param string $type
     * @return bool
     */
    public function checkLength($type) : bool {

        if ( strlen($type) == 1 ) {return true;}
        else {return false;}

    }



    /**
     * Function which check if the type number contains letters
     * 
     * @param string $type
     * @return bool
     */
    public function checkLetter($type) : bool {

        if (preg_match('/[a-zA-Z ]/', $type)) {return false;}
        else {return true;}

    }
}