<?php

    /**
    * Class role used for permissions of every user
    * 
    * @author Quentin
    */

    namespace app\models;

    class Role  {

        // Properties of the class
        private int $id;
        private string $libelle;
        private int $permissions;


        /**
         * Construct of Role
         * 
         * @param string $id
         * @param string $libelle
         * @param int $permissions
        */
        public function __construct(string $id, string $libelle, int $permissions) {

            $this->id = $id;
            $this->libelle = $libelle;
            $this->permissions = $permissions;

        }


        // ==================== Getter for private properties ====================

            /**
             * Function which get the id of the role
             */
            public function getId() { return $this->id; }

            /**
             * Function which get the libelle of the role
             */
            public function getLibelle() { return $this->libelle; }

            /**
             * Function which get the permissions of the role
             */
            public function getPermissions() { return $this->permissions; }





        // ==================== Setter for private properties ====================

            /**
             * Function which set the id of a role
             * 
             * @param string $id
             */
            public function setId($id) {

                $this->id = $id;
                return $this;

            }

            /**
             * Function which set the libelle of a role
             * 
             * @param string $libelle
             */
            public function setLibelle($libelle) {

                $this->libelle = $libelle;
                return $this;

            }

            /**
             * Function which set the permissions of a role
             * 
             * @param int $permissions
             */
            public function setPermissions($permissions) {

                $this->permissions = $permissions;
                return $this;

            }



    }


?>