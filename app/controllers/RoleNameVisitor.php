<?php

    namespace app\controllers;


    class RoleNameVisitor extends AbstractVisitor {


        /**
         * Function which will check the validity of the role name passed through html forms.
         * 
         * @param string $roleName
         * 
         * @return bool
         */
        public function checkDataValidity(string $roleName) : bool {

            if($this->checkUppercase($roleName) == true && $this->checkLetter($roleName) == true) {return true;}
            else {return false;}
             
        }



        /**
         * Function which will check if the role name begins with an uppercase
         * 
         * @param string $roleName
         * 
         * @return bool
         */
        public function checkUppercase(string $roleName) : bool {

            return preg_match('/^[A-Z]/', $roleName);
            
        }



        /**
         * Function which will check if the rest of the role name is only composed of letter
         * 
         * @param string $roleName
         * 
         * @return bool
         */
        public function checkLetter(string $roleName) : bool {

            if(preg_match("/\A[A-Za-z\s\-]+\z/", $roleName)) {return true;}
            else {return false;}

        }

    }

?>