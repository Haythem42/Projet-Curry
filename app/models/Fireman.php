<?php

    namespace app\models;


    /**
     * Class Fireman
     *
     * @author TakeN
     */
    class Fireman {

        private string $Matricule;
        private string $Prenom;
        private string $Nom;
        private string $ChefAgret;
        private string $DateNaissance;
        private int $NumCaserne;
        private string $CodeGrade;
        private string $MatriculeResponsable;




        /**
         * Construct of Fireman
         * 
         * @param string $matricule
         * @param string $prenom
         * @param string $nom
         * @param string $chefAgret
         * @param string $dateNaissance
         * @param int $NumCaserne
         * @param string $codeGrade
         * @param string $matriculeResponsable
        */
        public function __construct($matricule,$prenom,$nom,$chefAgret,$dateNaissance,$numCaserne,$codeGrade,$matriculeResponsable) {

            $this->Matricule = $matricule;
            $this->Prenom = $prenom;
            $this->Nom = $nom;
            $this->ChefAgret = $chefAgret;
            $this->DateNaissance = $dateNaissance;
            $this->NumCaserne = $numCaserne;
            $this->CodeGrade = $codeGrade;
            $this->MatriculeResponsable = $matriculeResponsable;

        }
 
        


        // ==================== Getter for private properties ====================

        /**
         * Function which get the matricule of a fireman
         */
        public function getMatricule() {

            return $this->Matricule;

        }



        /**
         * Function which get the first name of a fireman
         */
        public function getPrenom() {

            return $this->Prenom;

        }



        /**
         * Function which get the last name of a fireman
         */
        public function getNom() {

            return $this->Nom;

        }



        /**
         * Function which get the chef agret of a fireman
         */
        public function getChefAgret() {

            return $this->ChefAgret;

        }



        /**
         * Function which get the birth date of a fireman
         */
        public function getDateNaissance() {

            return $this->DateNaissance;

        }



        /**
         * Function which get the barrack number of a fireman
         */
        public function getNumCaserne() {

            return $this->NumCaserne;

        }



        /**
         * Function which get the grade code of a fireman
         */
        public function getCodeGrade() {

            return $this->CodeGrade;

        }



        /**
         * Function which get the matricule of the manager of a fireman
         */
        public function getMatriculeResponsable() {

            return $this->MatriculeResponsable;

        }




        // ==================== Setter for private properties ====================

        /**
         * Function which set the matricule of a fireman
         * 
         * @param string $matricule
         */
        public function setMatricule($matricule) {

            $this->Matricule = $matricule;
            return $this;

        }



        /**
         * Function which set the first name of a fireman
         * 
         * @param string $prenom
         */
        public function setPrenom($prenom) {

            $this->Prenom = $prenom;
            return $this;

        }



        /**
         * Function which set the last name of a fireman
         *
         * @param string $nom
         */
        public function setNom($nom) {

            $this->Nom = $nom;
            return $this;

        }



        /**
         * Function which set the chef agret of a fireman
         * 
         * @param string $chefAgret
         */
        public function setChefAgret($chefAGret) {

            $this->ChefAgret = $chefAGret;
            return $this;

        }



        /**
         * Function which set the birth date of a fireman
         * 
         * @param string $dateNaissance
         */
        public function setDateNaissance($dateNaissance) {

            $this->DateNaissance = $dateNaissance;
            return $this;

        }



        /**
         * Function which set the barrack number of a fireman
         * 
         * @param int $numCaserne
         */
        public function setNumCaserne($numCaserne) {

            $this->NumCaserne = $numCaserne;
            return $this;

        }



        /**
         * Function which set the grade code of a fireman
         * 
         * @param string $codeGrade
         */
        public function setCodeGrade($codeGrade) {

            $this->CodeGrade = $codeGrade;
            return $this;

        }



        /**
         * Function which set the matricule of the manager of a fireman
         * 
         * @param string $matriculeResponsable
         */
        public function setMatriculeResponsable($matriculeResponsable) {

            $this->MatriculeResponsable = $matriculeResponsable;
            return $this;

        }

    }

?>