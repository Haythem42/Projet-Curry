<?php

    namespace app\controllers;


    class MailVisitor extends AbstractVisitor {


        /**
         * Function which will check the validity of the mail passed through html forms.
         * 
         * @param string $mail
         * 
         * @return bool
         */
        public function checkDataValidity(string $mail) : bool {

           if(
               $this->checkMailBeginning($mail) == true and
               $this->checkDot($mail) == true and
               $this->checkAtPresence($mail) == true and
               $this->checkBetweenDots($mail) == true and
               $this->checkAfterLastDot($mail) == true
           )
           {return true;}
           else
           {return false;}
            
        }


        /**
         * Function which will checks if the mail begin with lowercase.
         * 
         * @param string $mail
         * 
         * @return bool
         */
        public function checkMailBeginning($mail) : bool{

            if(preg_match('/^[a-z]/',$mail) == true) {return true;}
            else {return false;}

        }



        /**
         * Function which checks if the second character is a dot.
         * 
         * @param string $mail
         * 
         * @return bool
         */

        public function checkDot($mail) : bool {

            if($mail[1] == ".") {return true;}
            else { return false;}

        }


        /**
         * Function which checks if the part between dot and at is only composed of letters.
        *
        * @param string $mail
        *
        * @return bool
        */
        public function checkAtPresence($mail) : bool{

            $tableEmail = explode("@", $mail);
            if(count($tableEmail) == 2) {return true;}
            else {return false;}

        }


        /**
         * Function which checks if the part between the two dots is onyl composed of letters.
         * 
         * @param $mail
         * 
         * @return bool
         */
        public function checkBetweenDots($mail) {
            
            $tableEmail = explode(".", $mail);
            $stringBetweenDots = str_replace("@", "", $tableEmail[1]);
            if(ctype_alpha($stringBetweenDots) == true) {return true;}
            else {return false;}

        }


        /**
         * Function which checks if the part after the last dot is only composed of letters.
         * 
         * @param $mail
         * 
         * @return bool
         */
        public function checkAfterLastDot($mail) {

            $tableEmail = explode(".", $mail);
            if(ctype_alpha($tableEmail[2]) == true) {return true;}
            else {return false;}

        }
        

    }

?>