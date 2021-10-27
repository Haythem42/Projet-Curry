<?php

    /**
    * Class User used for administration
    * 
    * @author Quentin
    */

    namespace app\models;

    class User {

        // Properties of the class
        private string $id;
        private string $login;
        private string $password;
        private string $roleId;
        


        /**
         * Construct of User
         * 
         * @param string $id
         * @param string $login
         * @param string $password
         * @param string $roleId
        */
        public function __construct(string $id, string $login, string $password, string $roleId) {

            $this->id = $id;
            $this->login = $login;
            $this->password = $password;
            $this->roleId = $roleId;

        }


        // ==================== Getter for private properties ====================

            /**
             * Function which get the id of the user
             */
            public function getId() { return $this->id; }


            /**
             * Function which get the login of the user
             */
            public function getLogin() { return $this->login; }


            /**
             * Function which get the password of the user
             */
            public function getPassword() { return $this->password; }

            /**
             * Function which get the role of the user
             */
            public function getRoleId() { return $this->roleId; }

        


        // ==================== Setter for private properties ====================

            /**
             * Function which set the id of a user
             * 
             * @param string $id
             */
            public function setId($id) {

                $this->id = $id;
                return $this;

            }

            /**
             * Function which set the login of a user
             * 
             * @param string $login
             */
            public function setLogin($login) {

                $this->login = $login;
                return $this;

            }

            /**
             * Function which set the password of a user
             * 
             * @param string $password
             */
            public function setPassword($password) {

                $this->password = $password;
                return $this;

            }

            /**
             * Function which set the role of a user
             * 
             * @param string $roleId
             */
            public function setRoleId($roleId) {

                $this->roleId = $roleId;
                return $this;

            }

    }

?>