<?php

    namespace app\controllers;


    class GradeCodeVisitor extends AbstractVisitor {


        /**
         * Function which will check the grade code passed through html forms.
         * 
         * @param string $gradeCode
         * 
         * @return bool
         */
        public function checkDataValidity(string $gradeCode) : bool {

            if($this->checkLength($gradeCode) == true && $this->checkAlphanumeric($gradeCode) == true) {return true;}
            else {return false;}
            
        }



        /**
         * Function which will check if the code grade has a length of 2
         * 
         * @param string $gradeCode
         * 
         * @return bool
         */
        public function checkLength($gradeCode) : bool {

            if(strlen($gradeCode) == 2) {return true;}
            else {return false;}

        }



        /**
         * Function which will check if the grade code is an alphanumeric value
         * 
         * @param string $gradeCode
         * 
         * @return bool
         */
        public function checkAlphanumeric($gradeCode) {

            if(ctype_alnum($gradeCode)) {return true;}
            else {return false;}

        }

    }

?>