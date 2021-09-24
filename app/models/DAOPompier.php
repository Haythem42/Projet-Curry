<?php


    namespace app\models;


    /**
     * Description of DAOpompier
     * 
     * @author TakeN
     */
    class DAOPompier {

        private $connexion;

        public function __construct($connexion)
        {
            $this->connexion = $connexion;
        }




        /**
         * Retrieve one fireman with the id.
         * 
         * @param int $id
         * @return Pompier 
         */
        public function find($id) : ?Pompier{


        }




        public function save(Pompier $pompier) : void {

        }




        public function update(Pompier $pompier) : void {

        }




        public function remove(Pompier $pompier) : void {

        }




        public function findAll($offset = 0, $limit = 10) : Array {

        }


        /**
         * Retrieve number of firemen in database
         * @return int
         */
        public function count() : int {

        }




        public function findFireHouseFromFireman(Pompier $pompier): ?Pompier{
            
        }

    }


?>