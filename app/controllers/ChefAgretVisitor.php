<?php

    namespace app\controllers;


    class ChefAgretVisitor extends AbstractVisitor {


        /**
         * Function which will check the validity of the chef Agret value passed through html forms.
         * 
         * @param string $chefAgret
         * 
         * @return bool
         */
        public function checkDataValidity(string $chefAgret) : bool {

            if($this->checkLength($chefAgret) == true && $this->checkValue($chefAgret) == true) {return true; }
            else {return false;}
             
        }



        /**
         * Function which will check if the value is composed of one character
         * 
         * @param string $chefAgret
         * 
         * @return bool
         */
        public function checkLength($chefAgret) : bool {

            if(strlen($chefAgret) == 1) {return true;}
            else {return false;}

        }



        /**
         * Function which will check if the value is N or O
         * 
         * @param string $chefAgret
         * 
         * @return bool
         */
        public function checkValue($chefAgret) : bool {

            if(in_array($chefAgret, array('O','N'))) {return true;}
            else {return false;}

        }
        
    }

?>