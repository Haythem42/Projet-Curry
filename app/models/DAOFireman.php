<?php


    namespace app\models;


    /**
     * DAOFireman which contains different kind of functions
     *
     * @author TakeN
     */
    class DAOFireman {

        private $connexion;

        /**
         * Constructor of the class DAOPompier
         *
         * @param type $connexion
         *
         */
        public function __construct($connexion) {

            $this->connexion = $connexion;

        }



        /**
         * Retrieve one fireman with the matricule
         *
         * @param int $matricule
         *
         * @return Fireman
         */
        public function retrieveFireman($matricule) : ?Fireman{

            
                $requestSQL = "SELECT * FROM pompiers WHERE Matricule =:matricule";

                $preparedStatement = $this->connexion->prepare($requestSQL);

                $preparedStatement->bindParam(':matricule', $matricule);

                $preparedStatement->execute();

                $data = $preparedStatement->fetchObject('app\models\\Fireman');

                return $data;


        }



        /**
        * Retrieve number of firemen in database
        *
        * @return int
        */
        public function countFiremen() : int {


                $requestSQL = "SELECT * FROM pompiers";

                $preparedStatement = $this->connexion->prepare($requestSQL);

                $preparedStatement->execute();

                $countFiremen = 0;

                while ($data = $preparedStatement->fetchObject('app\models\\Fireman')) {

                    $countFiremen += 1;

                }

                return $countFiremen;


        }



        /**
        * Retrieve the ten first firemen from the database
        *
        * @param int $limit
        * @param int $offset
        *
        * @return array $firemen
        */
        public function findAllFiremen($limit, $offset) : Array {


                $requestSQL = "SELECT * FROM pompiers LIMIT ? OFFSET ?";

                $preparedStatement = $this->connexion->prepare($requestSQL);

                $preparedStatement->bindValue(1, $limit, \PDO::PARAM_INT);
                $preparedStatement->bindValue(2, $offset, \PDO::PARAM_INT);
                $preparedStatement->execute();

                $firemen = array();

                while ($data = $preparedStatement->fetchObject('app\models\\Fireman')) {

                    array_push($firemen, $data);

                }

                return $firemen;


        }



        /**
         *Saving one fireman in the database
         *
         * @param Fireman $fireman
         * 
         * @return int $linesAdded
         */
        public function saveFireman(Fireman $fireman) : int {


                $requestSQL = "INSERT INTO pompiers VALUES (?,?,?,?,?,?,?,?)";

                $preparedStatement = $this->connexion->prepare($requestSQL);

                $preparedStatement->bindValue(1,$fireman->getMatricule());
                $preparedStatement->bindValue(2,$fireman->getPrenom());
                $preparedStatement->bindValue(3,$fireman->getNom());
                $preparedStatement->bindValue(4,$fireman->getChefAgret());
                $preparedStatement->bindValue(5,$fireman->getDateNaissance());
                $preparedStatement->bindValue(6,$fireman->getNumCaserne());
                $preparedStatement->bindValue(7,$fireman->getCodeGrade());
                $preparedStatement->bindValue(8,$fireman->getMatriculeResponsable());

                $preparedStatement->execute();

                $linesAdded = $preparedStatement->rowCount();

                return $linesAdded;


        }



        /**
         * Delete  the given fireman from the database
         * 
         * @param Fireman $fireman
         * 
         * @return int $linesDeleted
         */
        public function removeFireman(Fireman $fireman) : int {


                $matriculeToDelete = $fireman->getMatricule();

                $requestSQL = "DELETE FROM pompiers WHERE Matricule = :matriculeToDelete";

                $preparedStatement = $this->connexion->prepare($requestSQL);

                $preparedStatement->bindParam(':matriculeToDelete', $matriculeToDelete);

                $preparedStatement->execute();

                $linesDeleted = $preparedStatement->rowCount();

                return $linesDeleted;


        }



        /**
         * Updating information about one fireman
         * 
         * @param Fireman $fireman
         * 
         * @return int $linesModified
         */
        public function updateFireman(Fireman $fireman) : int {


                $requestSQL = "UPDATE pompiers SET Prenom = :prenom, Nom = :nom, ChefAgret = :chefAgret, DateNaissance = :dateNaissance, NumCaserne = :numCaserne, CodeGrade = :codeGrade, MatriculeResponsable = :matriculeResponsable WHERE Matricule = :matricule";

                $preparedStatement = $this->connexion->prepare($requestSQL);

                $preparedStatement->bindValue(':prenom', $fireman->getPrenom());
                $preparedStatement->bindValue(':nom', $fireman->getNom());
                $preparedStatement->bindValue(':chefAgret', $fireman->getChefAgret());
                $preparedStatement->bindValue(':dateNaissance', $fireman->getDateNaissance());
                $preparedStatement->bindValue(':numCaserne', $fireman->getNumCaserne());
                $preparedStatement->bindValue(':codeGrade', $fireman->getCodeGrade());
                $preparedStatement->bindValue(':matriculeResponsable', $fireman->getMatriculeResponsable());
                $preparedStatement->bindValue(':matricule', $fireman->getMatricule());

                $preparedStatement->execute();

                $linesModified = $preparedStatement->rowCount();

                return $linesModified;


        }



        /**
         * Retrieve barrack's information from one specific fireman
         * 
         * @param Fireman $fireman
         * 
         * @return Caserne $barrack
         */
        public function retrieveBarracksFromFireman(Fireman $fireman): ?Caserne{


                $matriculeFireman = $fireman->getMatricule();

                $requestSQL = "SELECT NumCaserne FROM pompiers WHERE Matricule = :matricule";

                $preparedStatement = $this->connexion->prepare($requestSQL);

                $preparedStatement->bindParam(':matricule', $matriculeFireman);

                $preparedStatement->execute();

                $data = $preparedStatement->fetch();

                
                $requestSQL = "SELECT * FROM casernes WHERE NumCaserne = :numCaserne";

                $preparedStatement = $this->connexion->prepare($requestSQL);

                $preparedStatement->bindParam(':numCaserne', $data[0]);

                $preparedStatement->execute();

                $barrack = $preparedStatement->fetchObject('app\models\\Caserne');

                return $barrack;


        }


    }


?>