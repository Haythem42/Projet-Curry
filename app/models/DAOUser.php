<?php

    namespace app\models;

    /**
     * DAOUser which contains function for manipulation
     *
     * @author Quentin
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
                    SET password=:userPassword
                    WHERE id=:userId";

            $preparedStatement = $this->connexion->prepare($sql);

            $preparedStatement->bindValue(':userId', $user->getId());
            
            $preparedStatement->bindValue(':userPassword', password_hash($user->getPassword(), PASSWORD_DEFAULT));

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


        /**
         * Function which get a user by login.
         * 
         * @param $login
         * 
         * @return User $user
         */
        public function getByUsername($login) : User{

            $sql = "SELECT  utilisateurs.id,
                            utilisateurs.mail,
                            utilisateurs.password,
                            utilisateurs.firstName,
                            utilisateurs.lastName,
                            utilisateurs.roleId,
                            role.name,
                            role.permissions
                    FROM utilisateurs 
                    INNER JOIN role ON utilisateurs.roleId =role.id
                    AND utilisateurs.mail = ?";

            
            $preparedStatement = $this->connexion->prepare($sql);

            $preparedStatement->bindValue(1, $login);

            $preparedStatement->execute();


            $data = $preparedStatement->fetch(\PDO::FETCH_OBJ);

            if(empty($data)){

                header("Location: ");
                $_SESSION['erreur'] = true;
                exit();

            } else {

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

            }


            return $user;
        }


        /**
         * Function which returns the role of a user using his id.
         * 
         * @param $id
         * 
         * @return string $role
         */
        public function findRole($id) : string {

            $sql = "SELECT role.name
                    FROM utilisateurs
                    INNER JOIN role ON utilisateurs.roleId =role.id
                    AND utilisateurs.id = ?";

            $preparedStatement = $this->connexion->prepare($sql);

            $preparedStatement->bindValue(1, $id);

            $preparedStatement->execute();

            $array = $preparedStatement->fetch();

            $role = $array[0];

            return $role;

        }


        /**
         * Function which returns the permissions of the user using his id.
         * 
         * @param int $id
         * 
         * @return int $permissions
         */
        public function getPermissions($id) {

            $sql = "SELECT role.permissions
                    FROM utilisateurs
                    INNER JOIN role ON utilisateurs.roleId =role.id
                    AND utilisateurs.id = ?";

            $preparedStatement = $this->connexion->prepare($sql);

            $preparedStatement->bindValue(1, $id);

            $preparedStatement->execute();

            $array = $preparedStatement->fetch();

            $permissions = $array[0];

            return $permissions;

        }



        /**
         * Functin which returns an array with information about the user.
         * 
         * @param int $id
         * 
         * @return User $user.
         */
        public function getBYId($id) : User {

            $sql = "SELECT  utilisateurs.id,
                            utilisateurs.mail,
                            utilisateurs.firstName,
                            utilisateurs.lastName,
                            role.name
                    FROM utilisateurs
                    INNER JOIN role ON utilisateurs.roleId =role.id
                    AND utilisateurs.id = ?";

            $preparedStatement = $this->connexion->prepare($sql);

            $preparedStatement->bindValue(1, $id);

            $preparedStatement->execute();

            while ($data = $preparedStatement->fetch(\PDO::FETCH_OBJ)) {

                $user = new User(   
                                        $data->id,
                                        $data->mail,
                                        "",
                                        $data->firstName,
                                        $data->lastName,
                                        0,
                                        $data->name,
                                        0
                                    );

            }

            return $user;

        }
    }

?>