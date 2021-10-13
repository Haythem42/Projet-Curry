<?php

    namespace app\controllers;


    class Filter {
        
        private $visitors = [];
        private $results = [];
        private $formData;
        
        public function __construct($formData) {

            $this->formData = $formData;

        }

        public function acceptVisitor(string $key, AbstractVisitor $visitor) {

            $this->visitors[$key] = $visitor;
            
        }



        public function visit() :  array {

            foreach($this->formData as $key => $value) {

                $this->results[$key] = $this->visitors[$key]->checkDataValidity($value);

            }

            return $this->results;

        }



        public function getStatus(string $key) {

            return $this->results[$key];

        }
    }

?>