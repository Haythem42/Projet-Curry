<?php

namespace app\controllers;

class CityVisitor extends AbstractVisitor {


    /**
     * Function which will check the validity of the city passed through html forms.
     * 
     * @param string $city
     * 
     * @return bool
    */
    public function checkDataValidity($city) : bool {

        if ( $this->checkFirstLetterUppercase($city) == true && $this->checkSymbol($city) == true && $this->checkNumber($city) == true && $this->checkLetter($city) == true ) {return true;}
        else {return false;}

    }



    /**
     * Function which check if the first letter of the city is uppercase
     * 
     * @param string $city
     * @return bool
     */
    public function checkFirstLetterUppercase($city) : bool {

        if ( preg_match('~^\p{Lu}~u', $city) ){return true;}
        else {return false;}

    }



    /**
     * Function which check if the city contains symbols
     * 
     * @param string $city
     * @return bool
     */
    public function checkSymbol($city) : bool {

        if ( preg_match('/'.preg_quote('^\'£$%^&*()}{@#~?><,@|-=-_+¬', '/').'/', $city) ){return false;}
        else {return true;}

    }



    /**
     * Function which check if the city contains numbers
     * 
     * @param string $city
     * @return bool
     */
    public function checkNumber($city) : bool {
     
        $isThereNumber = false;
        
        for ($i = 0; $i < strlen($city); $i++) {
            if ( ctype_digit($city[$i]) ) {
                $isThereNumber = true;
                break;
            }
        }
 
        if ( $isThereNumber ) {return false;}
        else {return true;}
        
    }

    

    /**
     * Function which check if the city contains only letters
     * 
     * @param string $city
     * @return bool
     */
    public function checkLetter($city) : bool {

        if (preg_match('/[a-zA-Z]/', $city)) {return true;}
        else {return false;}

    }
}