<?php

    namespace app\models;

    /**
    * Description of casernes
    * 
    * @author Haythem
    */
    class Barrack {

        // Properties of the class
        private $NumCaserne;
        private $Adresse;
        private $CP;
        private $Ville;
        private $CodeTypeC;

        /**
         * Construct of Barrack
         * 
         * @param int $numCaserne
         * @param string $adresse
         * @param string $cp
         * @param string $ville
         * @param string $codeTypeC
        */
        public function __construct($numCaserne, $adresse, $cp, $ville, $codeTypeC){

            $this->NumCaserne = $numCaserne;
            $this->Adresse = $adresse;
            $this->CP = $cp;
            $this->Ville = $ville;
            $this->CodeTypeC = $codeTypeC;

        }


        /* ---------- GET functions ---------- */

            /**
             * Function which get the number of the barrack
             */
            public function getNumCaserne(){

                return $this->NumCaserne;

            }

            /**
            * Function which get the addresse of the barrack
            */
            public function getAdresse(){

                return $this->Adresse;

            }

            /**
            * Function which get the postal code of the barrack
            */
            public function getCP(){

                return $this->CP;

            }

            /**
            * Function which get the city of the barrack
            */
            public function getVille(){

                return $this->Ville;

            }

            /**
            * Function which get the code of the type barrack
            */
            public function getCodeTypeC(){

                return $this->CodeTypeC;

            }


        /* ---------- SET functions ---------- */

            /**
             * Function which set the number of a barrack
             * 
             * @param int $NumCaserne
             */
            public function setNumCaserne($NumCaserne){

                $this->NumCaserne = $NumCaserne;
                return $this;

            }

            /**
             * Function which set the address of a barrack
             * 
             * @param string $Adresse
             */
            public function setAdresse($Adresse){

                $this->Adresse = $Adresse;
                return $this;

            }

            /**
             * Function which set the postal code of a barrack
             * 
             * @param string $CP
             */
            public function setCP($CP){

                $this->CP = $CP;
                return $this;

            }

            /**
             * Function which set the city of a barrack
             * 
             * @param string $Ville
             */
            public function setVille($Ville){

                $this->Ville = $Ville;
                return $this;

            }

            /**
             * Function which set the code of a type barrack
             * 
             * @param string $CodeTypeC
             */
            public function setCodeTypeC($CodeTypeC){

                $this->CodeTypeC = $CodeTypeC;
                return $this;

            }

    }