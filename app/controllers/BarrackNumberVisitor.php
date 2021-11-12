<?php

    namespace app\controllers;


    class BarrackNumberVisitor extends AbstractVisitor {


        /**
         * Function which will check the barrack's number passed through html forms.
         * 
         * @param string $barrackNumber
         * 
         * @return bool
         */
        public function checkDataValidity(string $barrackNumber) : bool {

            if($this->checkNumbers($barrackNumber) == true && $this->checkNegative($barrackNumber) == true){return true;}
            else {return false;}
            
        }



        /**
         * Function which will check if barrack number is only composed of number
         * 
         * @param string $barrackNumber
         * 
         * @return bool
         */
        public function checkNumbers($barrackNumber) : bool {

            if(is_numeric($barrackNumber)) {return true;}
            else {return false;}

        }



        /**
         * Function which will check if the barrack"s number is not negative
         * 
         * @param string $barrackNumber
         * 
         * @return bool
         */
        public function checkNegative($barrackNumber) : bool {

            if(intval($barrackNumber) < 0) {return false;}
            else {return true;}

        }

    }

?>