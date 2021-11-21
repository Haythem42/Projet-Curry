<?php

    namespace app\controllers;


    class BirthDateVisitor extends AbstractVisitor {


        /**
         * Function which will check the validity of the birth date value passed through html forms (fireman between 16 and 65).
         * 
         * @param string $birthDate
         * 
         * @return bool
         */
        public function checkDataValidity(string $birthDate) : bool {

            if($this->checkAge($birthDate) == true) {return true;}
            
            else {return false;}
             
        }



        /**
         * Function which will check if the fireman is not too young or too old
         * 
         * @param string $birthDate
         * 
         * @return bool
         */
        public function checkAge($birthDate) : bool {

            if(date("Y") - date("Y", strtotime($birthDate)) < 16 || date("Y") - date("Y", strtotime($birthDate)) > 65) {return false;}

            else {return true;}

        }
        
    }

?>