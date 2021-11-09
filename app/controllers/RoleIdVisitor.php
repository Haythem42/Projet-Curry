<?php

    namespace app\controllers;


    class RoleIdVisitor extends AbstractVisitor {


        /**
         * Function which will check the validity of the roleId passed through html forms.
         * 
         * @param string $roleId
         * 
         * @return bool
         */
        public function checkDataValidity(string $roleId) : bool {

           if($this->checkNumber($roleId) == true){return true;}
           else{return false;}
            
        }


        /**
         * Function which checks if the role id is a number.
         * 
         * @param $roleId
         * 
         * @return bool
         */
        public function checkNumber($roleId){
            if(is_numeric($roleId) == true){return true;}
            else {return false;}
        }
        

    }

?>