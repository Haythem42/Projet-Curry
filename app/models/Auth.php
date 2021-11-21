<?php


/**
* Description of casernes
* 
* @author Quentin
*/

namespace app\models;


use app\utils\SingletonDBMaria;
use app\models\DAOUser;

class Auth{



    /**
     * Function which returns a boolean if the user is or isn't logged.
     * 
     * @return bool
     */
    public static function is_logged() : bool {

        if(isset($_SESSION['auth'])){ return true;}
        else {return false;}


    }



    /**
     * Function which returns the user if the information of the connexion are stocked in the DB.
     * 
     * @param string $username
     * @param string $password
     * 
     * @return User $user
     */
    public static function login(string $username, string $password) : ?User{

        $daoUser = new DaoUser(SingletonDBMaria::getInstance()->getConnection());

        // Find the user using is username.

        $user = $daoUser->getByUsername($username);
        

        // Check if the password is correct.
        if (password_verify($password, $user->getPassword())){

            if(session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $array = Array();
            array_push($array, $user->getId());
            array_push($array, $user->getFirstName());
            array_push($array, $user->getLastName());
            $_SESSION['auth'] = $array;

            return $user;

        }else {

            $_SESSION['erreur'] = true;
            header("Location: ");

        }


    }



    public static function logout() {

        session_destroy();
        header("Location: /");

    }



    /**
     * Function which returns a boolean if the user has or hasn't a specific role.
     * 
     * @param string $role
     * 
     * @return bool
     */
    public static function has($role) :bool {

        $daoUser = new DaoUser(SingletonDBMaria::getInstance()->getConnection());

        // Getting the role of the user logged
        $userRole = $daoUser->findRole($_SESSION['auth'][0]);

        // Compare the user role to the role wanted
        if($userRole == $role) {return true;}
        else {return false;}


    }



    /**
     * Function which returns a boolean if the user has or hasn't a specific permission.
     * 
     * @param int $perm
     * 
     * @return bool
     */
    public static function can(int $perm) : bool {


        $daoUser = new DaoUser(SingletonDBMaria::getInstance()->getConnection());


        // Getting the permissions of the user logged
        $userPermissions = $daoUser->getPermissions($_SESSION['auth'][0]);


        // Converting int number in binary number
        $binary = decbin($userPermissions);


        // Completing binary number when his length is not equal to 16.
        if(strlen($binary) != 16) {

            $stringZero = "";
            for($i=0; $i < 16-strlen($binary); $i++) {

                $stringZero = $stringZero."0";

            }

            $binary = $stringZero.$binary;

        }



        // Checking if the user has the permission passed as a parameter.
        if($binary[strlen($binary) - $perm] == "1") {return true;}
        else {return false;}


    }



    /**
     * Function which returns a user using the id stored in the $_SESSION variable.
     * 
     * @param int $id
     * 
     * @return User $user
     */
    public static function user(int $id) : User {


        $daoUser = new DaoUser(SingletonDBMaria::getInstance()->getConnection());

        $user = $daoUser->getById($id);

        return $user;

    }



}