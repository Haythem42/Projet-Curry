<?php

    namespace app\controllers;


    class MatriculeManagerVisitor extends AbstractVisitor {


        /**
         * Function which will check the validity of the matricule of the manager passed through html forms.
         * 
         * @param string $matriculeManager
         * 
         * @return bool
         */
        public function checkDataValidity(string $matriculeManager) : bool {

            if($this->checkPrefix($matriculeManager) == true && $this->checkNumbers($matriculeManager) == true && $this->checkLength($matriculeManager) == true) {return true;}
            else {return false;}
            
        }



        /**
         * Function which will check if the matricule of manager begins with "Ma"
         * 
         * @param string $matriculeManager
         * 
         * @return bool
         */
        public function checkPrefix(string $matriculeManager) : bool {

            if(substr($matriculeManager, 0, 2) == "Ma") {return true;}

            else {return false;}

        }



        /**
         * Function which will check if the matricule of manager has 4 numbers after the beginning of the matricule
         * 
         * @param string $matriculeManager
         * 
         * @return bool
         */
        public function checkNumbers($matriculeManager) : bool {

            if(is_numeric(substr($matriculeManager, 2, 8))) {return true;}

            else {return false;}

        }



        /**
         * Function which will check if the matricule of manager contains 6 characters
         * 
         * @param string $matriculeManager
         * 
         * @return bool
         */
        public function checkLength($matriculeManager) : bool {

            if(strlen($matriculeManager) == 6) {return true;}
            else {return false;}

        }
    }

?>