<?php

    namespace app\models;

    /**
    * Class role used for permissions of every user
    * 
    * @author Haythem
    */
    class Role  {

        // Properties of the class
        private int $id;
        private string $name;
        private int $permissions;


        /**
         * Construct of Role
         * 
         * @param int $id
         * @param string $name
         * @param int $permissions
        */
        public function __construct($id, $name, $permissions) {

            $this->id = $id;
            $this->name = $name;
            $this->permissions = $permissions;

        }


        // ==================== Getter for private properties ====================

            /**
             * Function which get the id of the role
             */
            public function getId() { 
                
                return $this->id; 
            
            }

            /**
             * Function which get the name of the role
             */
            public function getName() { 

                return $this->name; 
            
            }

            /**
             * Function which get the permissions of the role
             */
            public function getPermissions() { 
                
                return $this->permissions; 
            
            }


        // ==================== Setter for private properties ====================

            /**
             * Function which set the name of a role
             * 
             * @param string $name
             */
            public function setName($name) {

                $this->name = $name;
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