<?php

    namespace app\controllers;


    class LoginVisitor extends AbstractVisitor {


        /**
         * Function which will check the validity of the login passed through html forms.
         * 
         * @param string $login
         * 
         * @return bool
         */
        public function checkDataValidity(string $login) : bool {

           if($this->checkLoginBeginning($login) == true && $this->checkDot($login) == true && $this->checkAfterDot($login) == true) {return true;}
           else {return false;}
            
        }


        /**
         * Function which will checks if the login begin with lowercase.
         * 
         * @param string $login
         * 
         * @return bool
         */
        public function checkLoginBeginning($login) : bool{

            if(preg_match('/^[a-z]/',$login) == true) {return true;}
            else {return false;}

        }



        /**
         * Function which checks if the second character is a dot.
         * 
         * @param string $login
         * 
         * @return bool
         */

        public function checkDot($login) : bool {

            if($login[1] == ".") {return true;}
            else { return false;}

        }


        /**
         * Function which checks if the part after the dot is only composed of letters
        *
        * @param string $login
        *
        * @return bool
        */
        public function checkAfterDot($login) : bool{

            if(ctype_alpha(substr($login, 3, strlen($login))) == true) {return true;}
            else {return false;}

        }
        

    }

?>