<?php

    namespace app\models;

    /**
     * DAOUser which contains function for manipulation
     *
     * @author TakeN
     */
    class DAOUser {

        // Property of the class
        private $connexion;


        /**
         * COnstructor of the class which instanciate the object with a connection
         *
         * @param type $connexion
         *
         */
        public function __construct($connexion) {

            $this->connexion = $connexion;

        }




        /**
         * Function which recover all the user from the database
         */
        public function displayUser() {

            $sql = "SELECT * FROM user";

            $preparedStatement = $this->connexion->prepare($sql);

            $preparedStatement->execute();

            $users = array();

            while ($data = $preparedStatement->fetch(\PDO::FETCH_OBJ)) {

                $user = new User($data->id, $data->login, $data->password, $data->role);
                array_push($users, $user);

            }

            return $users;

        }





        /**
         * Function which creates a new user in the database
         * 
         */
        public function createUser(User $user) : int { 


            $sql = "INSERT INTO user VALUES (?, ?, ?, ?)";

            $preparedStatement = $this->connexion->prepare($sql);

            $preparedStatement->bindValue(1,$user->getId());
            $preparedStatement->bindValue(2,$user->getLogin());
            $preparedStatement->bindValue(3,$user->getPassword());
            $preparedStatement->bindValue(4,$user->getRole());

            $preparedStatement->execute();

            $linesAdded = $preparedStatement->rowCount();

            return $linesAdded;

        }




        /**
         * Function which modify an existing user in the database
         * 
         */
        public function modifyUser(User $user) : int {  

            $sql = "UPDATE user SET login=:userLogin, password=:userPassword, role=:userRole WHERE id=:userId";

            $preparedStatement = $this->connexion->prepare($sql);

            $preparedStatement->bindValue(':userLogin', $user->getLogin());
            $preparedStatement->bindValue(':userPassword', $user->getPassword());
            $preparedStatement->bindValue(':userRole', $user->getRole());
            $preparedStatement->bindValue(':userId', $user->getId());

            $preparedStatement->execute();

            $linesModified = $preparedStatement->rowCount();

            return $linesModified;

        }





        /**
         * Function which delete an existing user from the database
         */
        public function deleteUser($id) : int {

            $sql = "DELETE FROM user WHERE id = ?";

            $preparedStatement = $this->connexion->prepare($sql);

            $preparedStatement->bindValue(1, $id);

            $preparedStatement->execute();

            $linesDeleted = $preparedStatement->rowCount();

            return $linesDeleted;

        }


    }

?>