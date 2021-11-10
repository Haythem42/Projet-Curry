<?php

    /**
    * Class User used for administration
    * 
    * @author Quentin
    */

    namespace app\models;

    class User {

        // Properties of the class
        private int $id;
        private string $mail;
        private string $password;
        private string $firstName;
        private string $lastName;
        private int $roleId;
        private string $roleName;
        private int $permissions;
        


        /**
         * Construct of User
         * 
         * @param int $id
         * @param string $mail
         * @param string $password
         * @param string $firstName
         * @param string $lastName
         * @param int $roleId
         * @param string $roleName
         * @param int $permissions
        */
        public function __construct(?int $id, ?string $mail, ?string $password, ?string $firstName, ?string $lastName, ?int $roleId, ?string $roleName, ?int $permissions) {

            $this->id = $id;
            $this->mail = $mail;
            $this->password = $password;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->roleId = $roleId;
            $this->roleName = $roleName;
            $this->permissions = $permissions;

        }


        // ==================== Getter for private properties ====================

            /**
             * Function which get the id of the user
             */
            public function getId() { return $this->id; }


            /**
             * Function which get the mail of the user
             */
            public function getMail() { return $this->mail; }


            /**
             * Function which get the password of the user
             */
            public function getPassword() { return $this->password; }

            /**
             * Function which get the first name of the user
             */
            public function getFirstName() { return $this->firstName; }

            /**
             * Function which get the last name of the user
             */
            public function getLastName() { return $this->lastName; }

            /**
             * Function which get the role id of the user
             */
            public function getRoleId() { return $this->roleId; }

            /**
             * Function which get the role name of the user
             */
            public function getRoleName() { return $this->roleName; }

            /**
             * Function which get the permissions of the user
             */
            public function getPermissions() { return $this->permissions; }

        


        // ==================== Setter for private properties ====================

            /**
             * Function which set the mail of a user
             * 
             * @param string $mail
             */
            public function setMail($mail) {

                $this->mail = $mail;
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
             * Function which set the first name of a user
             * 
             * @param string $firstName
             */
            public function setFirstName($firstName) {

                $this->firstName = $firstName;
                return $this;

            }

            /**
             * Function which set the last name of a user
             * 
             * @param string $lastName
             */
            public function setLastName($lastName) {

                $this->lastName = $lastName;
                return $this;

            }

            /**
             * Function which set the role id of a user
             * 
             * @param string $roleId
             */
            public function setRoleId($roleId) {

                $this->roleId = $roleId;
                return $this;

            }
            

    }

?>