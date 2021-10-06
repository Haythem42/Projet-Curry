<?php


    namespace app\models;




    /**
     * DAOFireman which contains CRUD functions
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
         * Function which retrieves one fireman from his 'matricule'.
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

                $data = $preparedStatement->fetch(\PDO::FETCH_OBJ);

                $fireman = new Fireman($data->Matricule,$data->Prenom,$data->Nom,$data->ChefAgret,$data->DateNaissance,$data->NumCaserne,$data->CodeGrade,$data->MatriculeResponsable);

                return $fireman;


        }





        /**
        * Function which retrieves the total number of firemen stored in the database.
        *
        * @return int
        */
        public function countFiremen() : int {


                $requestSQL = "SELECT * FROM pompiers";

                $preparedStatement = $this->connexion->prepare($requestSQL);

                $preparedStatement->execute();

                $countFiremen = 0;

                while ($data = $preparedStatement->fetch(\PDO::FETCH_OBJ)) {

                    $countFiremen += 1;

                }

                return $countFiremen;


        }





        /**
        * Function which retrieves a 'limit' number of firemen.
        *
        *@param int $offset
        *@param int $limit
        *
        * @return Array $firemen
        */
        public function findAllFiremen($offset, $limit) : Array {


                $requestSQL = "SELECT * FROM pompiers LIMIT ? OFFSET ?";

                $preparedStatement = $this->connexion->prepare($requestSQL);

                $preparedStatement->bindValue(1, $limit, \PDO::PARAM_INT);
                $preparedStatement->bindValue(2, $offset, \PDO::PARAM_INT);
                $preparedStatement->execute();

                $firemen = array();

                while ($data = $preparedStatement->fetch(\PDO::FETCH_OBJ)) {

                    $fireman = new Fireman($data->Matricule,$data->Prenom,$data->Nom,$data->ChefAgret,$data->DateNaissance,$data->NumCaserne,$data->CodeGrade,$data->MatriculeResponsable);
                    array_push($firemen, $fireman);

                }

                return $firemen;


        }

        

        public function findAll() : Array {

                $requestSQL = "SELECT * FROM pompiers";

                $preparedStatement = $this->connexion->prepare($requestSQL);

                $preparedStatement->execute();

                $firemen = array();

                while ($data = $preparedStatement->fetch(\PDO::FETCH_OBJ)) {

                    $fireman = new Fireman($data->Matricule,$data->Prenom,$data->Nom,$data->ChefAgret,$data->DateNaissance,$data->NumCaserne,$data->CodeGrade,$data->MatriculeResponsable);
                    array_push($firemen, $fireman);

                }

                return $firemen;
        }





        /**
         *Function which creates a new fireman in the database.
         *
         * @param Fireman $fireman
         * 
         * @return int $linesAdded
         */
        public function createFireman(Fireman $fireman) : int {


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
         * Function which deletes a fireman from the database.
         * 
         * @param Fireman $fireman
         * 
         * @return int $linesDeleted
         */
        public function removeFireman($matricule) : int {


                $requestSQL = "DELETE FROM pompiers WHERE Matricule = ?";

                $preparedStatement = $this->connexion->prepare($requestSQL);

                $preparedStatement->bindValue(1, $matricule);

                $preparedStatement->execute();

                $linesDeleted = $preparedStatement->rowCount();

                return $linesDeleted;


        }





        /**
         * Function which updates information about one fireman.
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
         * Function which retrieves the barrack associated with one specific fireman.
         * 
         * @param Fireman $fireman
         * 
         * @return Caserne $barrack
         */
        public function retrieveBarracksFromFireman(Fireman $fireman): ?Barrack{


                $requestSQL = "SELECT * FROM casernes WHERE NumCaserne = :numCaserne";

                $preparedStatement = $this->connexion->prepare($requestSQL);

                $preparedStatement->bindValue(':numCaserne', $fireman->getNumCaserne());

                $preparedStatement->execute();

                $data = $preparedStatement->fetch(\PDO::FETCH_OBJ);

                $barrack = new Barrack($data->NumCaserne,$data->Adresse,$data->CP,$data->Ville,$data->CodeTypeC);

                return $barrack;


        }


    }


?>