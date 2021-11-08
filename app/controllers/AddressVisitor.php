<?php

namespace app\controllers;

class AddressVisitor extends AbstractVisitor {


    /**
     * Function which will check the validity of the address passed through html forms.
     * 
     * @param string $address
     * 
     * @return bool
    */
    public function checkDataValidity($address) : bool {

        if ( $this->checkFirstLetterUppercase($address) == true && $this->checkSymbol($address) == true && $this->checkNumber($address) == true && $this->checkLetter($address) == true ) {return true;}
        else {return false;}

    }


    /**
     * Function which check if the first letter of the address is uppercase
     * 
     * @param string $address
     * @return bool
     */
    public function checkFirstLetterUppercase($address) : bool {

        if ( preg_match('~^\p{Lu}~u', $address) ){return true;}
        else {return false;}

    }



    /**
     * Function which check if the address contains symbols
     * 
     * @param string $address
     * @return bool
     */
    public function checkSymbol($address) : bool {

        if ( preg_match('/'.preg_quote('^\'£$%^&*()}{@#~?><,@|-=-_+-¬', '/').'/', $address) ){return false;}
        else {return true;}

    }



    /**
     * Function which check if the address contains numbers
     * 
     * @param string $address
     * @return bool
     */
    public function checkNumber($address) : bool {
     
        $isThereNumber = false;
        
        for ($i = 0; $i < strlen($address); $i++) {
            if ( ctype_digit($address[$i]) ) {
                $isThereNumber = true;
                break;
            }
        }
 
        if ( $isThereNumber ) {return false;}
        else {return true;}
        
    }

    

    /**
     * Function which check if the address contains only letters
     * 
     * @param string $address
     * @return bool
     */
    public function checkLetter($address) : bool {

        if (preg_match('/[a-zA-Z ]/', $address)) {return true;}
        else {return false;}

    }

}