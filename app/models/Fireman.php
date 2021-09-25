<?php


    namespace app\models;


    /**
     * Class Fireman
     *
     * @author TakeN
     */
    class Fireman {

        private $Matricule;
        private $Prenom;
        private $Nom;
        private $ChefAgret;
        private $DateNaissance;
        private $NumCaserne;
        private $CodeGrade;
        private $MatriculeResponsable;



        public function __construct() {}
 
        

        // ==================== Get functions for private properties ====================
        public function getMatricule() {

            return $this->Matricule;
        }

        public function getPrenom() {

            return $this->Prenom;
        }

        public function getNom() {

            return $this->Nom;
        }

        public function getChefAgret() {

            return $this->ChefAgret;
        }

        public function getDateNaissance() {

            return $this->DateNaissance;
        }

        public function getNumCaserne() {

            return $this->NumCaserne;
        }

        public function getCodeGrade() {

            return $this->CodeGrade;
        }

        public function getMatriculeResponsable() {

            return $this->MatriculeResponsable;
        }



        // ==================== Set functions for private properties ====================
        public function setMatricule($matricule) {

            $this->Matricule = $matricule;
            return $this;

        }

        public function setPrenom($prenom) {

            $this->Prenom = $prenom;
            return $this;

        }

        public function setNom($nom) {

            $this->Nom = $nom;
            return $this;

        }

        public function setChefAgret($chefAGret) {

            $this->ChefAgret = $chefAGret;
            return $this;

        }

        public function setDateNaissance($dateNaissance) {

            $this->DateNaissance = $dateNaissance;
            return $this;

        }

        public function setNumCaserne($numCaserne) {

            $this->NumCaserne = $numCaserne;
            return $this;

        }

        public function setCodeGrade($codeGrade) {

            $this->CodeGrade = $codeGrade;
            return $this;

        }

        public function setMatriculeResponsable($matriculeResponsable) {

            $this->MatriculeResponsable = $matriculeResponsable;
            return $this;

        }


    }


?>