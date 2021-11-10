<?php

    namespace app\controllers;


    class FirstNameVisitor extends AbstractVisitor {


        /**
         * Function which will check the validity of the first name passed through html forms.
         * 
         * @param string $firstName
         * 
         * @return bool
         */
        public function checkDataValidity(string $firstName) : bool {

           if($this->checkUppercase($firstName) == true && $this->checkLetter($firstName) == true) {return true;}
           else {return false;}
            
        }



        /**
         * Function which will check if the first name begins with an uppercase
         * 
         * @param string $firstName
         * 
         * @return bool
         */
        public function checkUppercase(string $firstName) : bool {

            return preg_match('/^[A-Z]/', $firstName);
            
        }



        /**
         * Function which will check if the rest of the first name is only composed of letter
         * 
         * @param string $firstName
         * 
         * @return bool
         */
        public function checkLetter(string $firstName) : bool {

            if(ctype_alpha($firstName)) {return true;}
            else {return false;}

        }

    }

?>