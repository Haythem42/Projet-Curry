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




        // ==================== Setter for private properties ====================
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