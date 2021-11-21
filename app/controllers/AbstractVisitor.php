<?php

    namespace app\controllers;


    /**
     * Design pattern visitor
     */
    abstract class AbstractVisitor {


        /**
         * Function which will check the validity of the data passed through html forms.
         * 
         * @param string $data
         * 
         * @return bool $validity
         */
        abstract public function checkDataValidity(string $data) : bool ;
        
    }

?>