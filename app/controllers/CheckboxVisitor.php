<?php

    namespace app\controllers;


    class CheckboxVisitor extends AbstractVisitor {


        /**
         * Function which will check the validity of the checkboxes passed through html forms.
         * 
         * @param string $checkbox
         * 
         * @return bool
         */
        public function checkDataValidity(string $checkbox) : bool {

            if($this->checkValue($checkbox) == true) {return true;}
            else {return false;}
             
        }



        /**
         * Function which will check the value of the checkbox
         * 
         * @param string $checkbox
         * 
         * @return bool
         */
        public function checkValue(string $checkbox) : bool {

            if($checkbox == "Y" or $checkbox == "N") {return true;}
            else {return false;}
            
        }

    }

?>