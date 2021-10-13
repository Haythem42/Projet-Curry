<?php

    namespace app\controllers;


    class MatriculeVisitor extends AbstractVisitor {


        /**
         * Function which will check the validity of the matricule passed through html forms.
         * 
         * @param string $matricule
         * 
         * @return bool
         */
        public function checkDataValidity(string $matricule) : bool {

            if($this->checkPrefix($matricule) == true && $this->checkNumbers($matricule) == true && $this->checkLength($matricule) == true) {return true;}
            else {return false;}
            
        }



        /**
         * Function which will check if the matricule begins with "Ma"
         * 
         * @param string $matricule
         * 
         * @return bool
         */
        public function checkPrefix(string $matricule) : bool {

            if(substr($matricule, 0, 2) == "Ma") {return true;}
            else {return false;}

        }



        /**
         * Function which will check if the matricule has 4 numbers after the beginning of the matricule
         * 
         * @param string $matricule
         * 
         * @return bool
         */
        public function checkNumbers($matricule) : bool {

            if(is_numeric(substr($matricule, 2, 8))) {return true;}
            else {return false;}

        }



        /**
         * Function which will check if the matricule contains 6 characters
         * 
         * @param string $matricule
         * 
         * @return bool
         */
        public function checkLength($matricule) : bool {

            if(strlen($matricule) == 6) {return true;}
            else {return false;}

        }
    }

?>