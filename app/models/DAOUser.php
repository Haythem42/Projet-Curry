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
         * Constructor of the class which instanciate the object with a connection
         *
         * @param type $connexion
         */
        public function __construct($connexion) {

            $this->connexion = $connexion;

        }




        /**
         * Function which recovers all the user from the database
         * 
         * @return array $users
         */
        public function displayUser() : array {

            $sql = "SELECT utilisateur.id,utilisateur.login,utilisateur.password,utilisateur.roleId,role.libelle  FROM utilisateur INNER JOIN role ON utilisateur.roleId =role.id";

            $preparedStatement = $this->connexion->prepare($sql);

            $preparedStatement->execute();

            $fullUsers = array();

            while ($data = $preparedStatement->fetch(\PDO::FETCH_OBJ)) {

                $fullUser = new FullUser($data->id,$data->login, $data->password, $data->roleId, $data->libelle);
                array_push($fullUsers, $fullUser);

            }

            return $fullUsers;

        }





        /**
         * Function which creates a new user in the database
         * 
         * @param User $user
         * 
         * @return int $linesAdded
         */
        public function createUser(User $user) : int { 


            $sql = "INSERT INTO utilisateur VALUES (?, ?, ?, ?)";

            $preparedStatement = $this->connexion->prepare($sql);

            $preparedStatement->bindValue(1,$user->getId());
            $preparedStatement->bindValue(2,$user->getLogin());
            $preparedStatement->bindValue(3,$user->getPassword());
            $preparedStatement->bindValue(4,$user->getRoleId());

            $preparedStatement->execute();

            $linesAdded = $preparedStatement->rowCount();

            return $linesAdded;

        }




        /**
         * Function which modifies an existing user in the database
         * 
         * @param User $user
         * 
         * @return int $linesModified
         */
        public function modifyUser(User $user) : int {  

            $sql = "UPDATE utilisateur SET login=:userLogin, password=:userPassword, roleId=:userRole WHERE id=:userId";

            $preparedStatement = $this->connexion->prepare($sql);

            $preparedStatement->bindValue(':userLogin', $user->getLogin());
            $preparedStatement->bindValue(':userPassword', $user->getPassword());
            $preparedStatement->bindValue(':userRole', $user->getRoleId());
            $preparedStatement->bindValue(':userId', $user->getId());

            $preparedStatement->execute();

            $linesModified = $preparedStatement->rowCount();

            return $linesModified;

        }





        /**
         * Function which deletes an existing user from the database
         * 
         * @param int $id
         * 
         * @return int $linesDeleted
         */
        public function deleteUser($id) : int {

            $sql = "DELETE FROM utilisateur WHERE id = ?";

            $preparedStatement = $this->connexion->prepare($sql);

            $preparedStatement->bindValue(1, $id);

            $preparedStatement->execute();

            $linesDeleted = $preparedStatement->rowCount();

            return $linesDeleted;

        }

    }

?>