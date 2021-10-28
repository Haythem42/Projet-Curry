<?php

    /**
    * Class User used for administration
    * 
    * @author Quentin
    */

    namespace app\models;

    class FullUser {

        // Properties of the class
        private int $id;
        private string $login;
        private string $password;
        private int $roleId;
        private string $roleLibelle;

        /**
         * Construct of FullUser
         * 
         * @param int $id
         * @param string $login
         * @param string $password
         * @param int $roleId
         * @param string $roleLibelle
        */
        public function __construct(int $id, string $login, string $password, int $roleId, string $roleLibelle) {

            $this->id = $id;
            $this->login = $login;
            $this->password = $password;
            $this->roleId = $roleId;
            $this->roleLibelle = $roleLibelle;

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
             * Function which get the role ID of the user
             */
            public function getRoleId() {return $this->roleId;}

            /**
             * Function which get the role of the user
             */
            public function getRoleLibelle() { return $this->roleLibelle; }

    }


?>
