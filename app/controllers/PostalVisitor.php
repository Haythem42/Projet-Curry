<?php

namespace app\controllers;

class PostalVisitor extends AbstractVisitor {


    /**
     * Function which will check the validity of the postal code passed through html forms.
     * 
     * @param string $postal
     * @return bool
    */
    public function checkDataValidity($postal) : bool {

        if ( $this->checkNumber($postal) == true && $this->checkLength($postal) == true && $this->checkLetter($postal) == true ) { return true; }
        else { return false; }

    }



    /**
     * Function which check if the postal code contains only numbers
     * 
     * @param string $postal
     * @return bool
     */
    public function checkNumber($postal) : bool {

        if( is_numeric($postal) ) { return true; }
        else { return false; }

    }



    /**
     * Function which check if the postal code length
     * 
     * @param string $postal
     * @return bool
     */
    public function checkLength($postal) : bool {

        if ( strlen($postal) == 5 ) { return true; }
        else { return false; }

    }



    /**
     * Function which check if the postal code contains letters
     * 
     * @param string $postal
     * @return bool
     */
    public function checkLetter($postal) : bool {

        if ( preg_match('/[a-zA-Z ]/', $postal) ) { return false; }
        else { return true; }

    }

}