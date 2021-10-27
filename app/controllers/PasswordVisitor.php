<?php

    namespace app\controllers;


    class PasswordVisitor extends AbstractVisitor {


        /**
         * Function which will check the validity of the password passed through html forms.
         * 
         * @param string $password
         * 
         * @return bool
         */
        public function checkDataValidity(string $password) : bool {

            if($this->checkLength($password) == true && $this->checkLowercase($password) == true && $this->checkUppercase($password) == true && $this->checkSpecialCharacter($password) == true && $this->checkNumber($password) == true) {return true;}
            else {return false;}
            
        }



        /**
         * Function which checks the length of the password.
         * 
         * @param string $password
         * 
         * @return bool
         */
        public function checkLength($password) : bool{
            if(strlen($password) >= 8) {return true;}
            else {return false;}
        }



        /**
         * Function which will checks if the password contains at least a number.
         * 
         * @param string $password
         * 
         * @return bool
         */
        public function checkNumber($password) : bool{
            if(preg_match('/[0-9]/',$password)) {return true;}
            else {return false;}
        }


        /**
         * Function which checks if the password contains at least one lowercase.
         * 
         * @param string $password
         * 
         * @return bool
         */
        public function checkLowercase($password) : bool {
            if(preg_match('/[a-z]/', $password)) {return true;}
            else {return false;}
        }


        /**
         * Function which checks if the password contains at least one uppercase.
         * 
         * @param string $password
         * 
         * @return bool
         * 
         */
        public function checkUppercase($password) : bool{
            if(preg_match('/[A-Z]/', $password)) {return true;}
            else {return false;}
        }



        /**
         * Function which checks if the password contains at least one specific character.
         * 
         * @param string $password
         * 
         * @return bool
         */
        public function checkSpecialCharacter($password) {
            if('/'.preg_quote('/[\'^£$%&*()}{@#~?><>,|=_+-]/', $password)){return true;}
            else {return false;}
        }
    }

?>