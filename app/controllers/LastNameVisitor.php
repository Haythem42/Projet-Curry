<?php

    namespace app\controllers;


    class LastNameVisitor extends AbstractVisitor {


        /**
         * Function which will check the validity of the last name passed through html forms.
         * 
         * @param string $lastname
         * 
         * @return bool
         */
        public function checkDataValidity(string $lastName) : bool {

            if($this->checkUppercase($lastName) == true && $this->checkLetter($lastName) == true) {return true;}
            else {return false;}
             
        }



        /**
         * Function which will check if the last name begins with an uppercase
         * 
         * @param string $lastName
         * 
         * @return bool
         */
        public function checkUppercase(string $lastName) : bool {

            return preg_match('/^[A-Z]/', $lastName);
            
        }



        /**
         * Function which will check if the rest of the last name is only composed of letter
         * 
         * @param string $lastName
         * 
         * @return bool
         */
        public function checkLetter(string $lastName) : bool {

            if(ctype_alpha($lastName)) {return true;}
            else {return false;}

        }

    }

?>