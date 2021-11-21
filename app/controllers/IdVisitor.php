<?php

    namespace app\controllers;


    class IdVisitor extends AbstractVisitor {


        /**
         * Function which will check the validity of the id and role id passed through html forms.
         * 
         * @param string $id
         * 
         * @return bool
         */
        public function checkDataValidity(string $id) : bool {

           if(is_numeric($id)) {return true;}
           
           else {return false;}
            
        }        

    }

?>