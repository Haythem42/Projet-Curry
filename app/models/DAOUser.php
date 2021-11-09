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

            $sql = "SELECT  utilisateurs.id,
                            utilisateurs.mail,
                            utilisateurs.password,
                            utilisateurs.firstName,
                            utilisateurs.lastName,
                            utilisateurs.roleId,
                            role.name,
                            role.permissions
                    FROM utilisateurs 
                    INNER JOIN role ON utilisateurs.roleId =role.id";

            $preparedStatement = $this->connexion->prepare($sql);

            $preparedStatement->execute();

            $users = array();

            while ($data = $preparedStatement->fetch(\PDO::FETCH_OBJ)) {

                $user = new User(   
                                        $data->id,
                                        $data->mail,
                                        $data->password,
                                        $data->firstName,
                                        $data->lastName,
                                        $data->roleId,
                                        $data->name,
                                        $data->permissions
                                    );

                array_push($users, $user);

            }

            return $users;

        }





        /**
         * Function which creates a new user in the database
         * 
         * @param User $user
         * 
         * @return int $linesAdded
         */
        public function createUser(User $user) : int { 


            $sql = "INSERT INTO utilisateurs (mail, password, firstName, lastName, roleId)
                    VALUES (?, ?, ?, ?, ?)";

            $preparedStatement = $this->connexion->prepare($sql);

            $preparedStatement->bindValue(1,$user->getMail());
            $preparedStatement->bindValue(2,password_hash($user->getPassword(), PASSWORD_DEFAULT));
            $preparedStatement->bindValue(3,$user->getFirstName());
            $preparedStatement->bindValue(4,$user->getLastName());
            $preparedStatement->bindValue(5,$user->getRoleId());

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

            $sql = "UPDATE utilisateurs 
                    SET mail=:userMail,
                        firstName=:userFirstName,
                        lastName=:userLastName,
                        roleId=:userRoleId 
                    WHERE id=:userId";

            $preparedStatement = $this->connexion->prepare($sql);

            $preparedStatement->bindValue(':userMail', $user->getMail());
            $preparedStatement->bindValue(':userFirstName', $user->getFirstName());
            $preparedStatement->bindValue(':userLastName', $user->getLastName());
            $preparedStatement->bindValue(':userRoleId', $user->getRoleId());

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

            $sql = "DELETE FROM utilisateurs 
                    WHERE id = ?";

            $preparedStatement = $this->connexion->prepare($sql);

            $preparedStatement->bindValue(1, $id);

            $preparedStatement->execute();

            $linesDeleted = $preparedStatement->rowCount();

            return $linesDeleted;

        }

    }

?>