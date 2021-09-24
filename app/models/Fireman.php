<?php


    namespace app\models;


    /**
     * Class Fireman
     * 
     * @author TakeN
     */
    class Fireman {

        private $matricule;
        private $prenom;
        private $nom;
        private $chefAgret;
        private $dateNaissance;
        private $numCaserne;
        private $codeGrade;
        private $matriculeRespo;


        /**
         * Constructor of the class Fireman
         * 
         * @param string $matricule
         * @param string $prenom
         * @param string $nom
         * @param char $chefAgret
         * @param datetime $dateNaissance
         * @param int $numCaserne
         * @param string $codeGrade
         * @param string $matriculeRespo
         * 
         */
        public function __construct($matricule,$prenom,$nom,$chefAgret,$dateNaissance,$numCaserne,$codeGrade,$matriculeRespo) {
            

            $this->matricule = $matricule;
            $this->prenom = $prenom;
            $this->nom = $nom;
            $this->chefAgret = $chefAgret;
            $this->dateNaissance = $dateNaissance;
            $this->numCaserne = $numCaserne;
            $this->codeGrade = $codeGrade;
            $this->matriculeRespo = $matriculeRespo;

        }

    }


?>