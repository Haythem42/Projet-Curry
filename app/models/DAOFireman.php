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
         * @return Fireman 
         */
        public function retrieveFireman($matricule) : ?Fireman{

            $requestSQL = "SELECT * FROM pompiers WHERE Matricule=:matricule";

            $preparedStatement = $this->connexion->prepare($requestSQL);

            $preparedStatement->bindParam("matricule",$matricule);

            $preparedStatement->execute();

            $fireman = $preparedStatement->fetchObject("Fireman");

            return $fireman;

        }
    
    }



    //     public function save(Pompier $pompier) : void {

    //     }




    //     public function update(Pompier $pompier) : void {

    //     }




    //     public function remove(Pompier $pompier) : void {

    //     }




    //     public function findAll($offset = 0, $limit = 10) : Array {

    //     }


    //     /**
    //      * Retrieve number of firemen in database
    //      * @return int
    //      */
    //     public function count() : int {

    //     }




    //     public function findFireHouseFromFireman(Pompier $pompier): ?Pompier{
            
    //     }

    // }

?>