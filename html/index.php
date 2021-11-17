<?php

require_once '../autoloader.php';

use app\controllers\FiremanController;
use app\controllers\BarrackController;
use app\controllers\UserController;
use app\controllers\RoleController;
use app\controllers\HomeController;
use app\controllers\ConnexionController;
use app\models\Auth;

session_start();


if (isset($_SERVER["PATH_INFO"])) {

    $path = trim($_SERVER["PATH_INFO"], "/");

} else {

    $path = "";

}


$fragments = explode("/", $path);

$control = array_shift($fragments);



switch ($control) {


    case '' :
        defaultRoutes_get($fragments);
        break;

    case "fireman" :

        if ($_SERVER["REQUEST_METHOD"] == "GET") {

            pompierRoutes_get($fragments);

        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            pompierRoutes_post($fragments);

        }
        break;

    case "barrack" :

        if ($_SERVER["REQUEST_METHOD"] == "GET") {

            caserneRoutes_get($fragments);

        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            caserneRoutes_post($fragments);

        }
        break;

    case "user" :

        if($_SERVER["REQUEST_METHOD"] == "GET") {

            usersRoutes_get($fragments);

        }

        if($_SERVER["REQUEST_METHOD"] == "POST") {

            usersRoutes_post($fragments);
        }
        break;

    case "role" :

        if ($_SERVER["REQUEST_METHOD"] == "GET") {

            roleRoutes_get($fragments);

        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            roleRoutes_post($fragments);

        }
        break;

    case "home":

        if ($_SERVER["REQUEST_METHOD"] == "GET") {

            homeRoutes_get($fragments);

        }

    case "connexion":
        
        if($_SERVER["REQUEST_METHOD"] == "GET") {

            connexionRoutes_get($fragments);

        }

}



function defaultRoutes_get($fragments) {

    call_user_func_array([new app\controllers\DefaultController(), "connexion"], $fragments);

}



function homeRoutes_get($fragments){


    $action = array_shift($fragments);

    switch($action) {


        case "display":
            // First check : if the user is logged.
            if (!empty($_SESSION['auth'])) { 

                call_user_func_array([new HomeController(), "home"], $fragments); 

            }
            // If the user is not logged, we redirect to login page.
            else { 

                $_SESSION['notConnected'] = true;
                header("Location: ../");
                exit();

            }
            break;


    }
}



function connexionRoutes_get($fragments){


    $action = array_shift($fragments);

    switch($action) {


        case "disconnect":
            // Calling the logout function of the Auth class.
            if (Auth::is_logged()) { call_user_func_array([new ConnexionController(), "exit"], $fragments); }
            break;


    }
}



function pompierRoutes_get($fragments) {


    $action = array_shift($fragments);

    switch ($action) {


        case "display" :
            //First check : if the user is logged.
            if(!empty($_SESSION['auth'])) {

                // Second check : if the user has the permissions to see firemen.
                if(Auth::can(1)) { 

                    call_user_func_array([new FiremanController(), "show"], $fragments);

                }
                // If the user doesn't have the permission, we redirect to permission error page.
                else { 
                
                    call_user_func_array([new FiremanController(), "error403"], $fragments);
                
                }

            }
            // If the user is not logged, we redirect to login page.
            else { 

                $_SESSION['notConnected'] = true;
                header("Location: ../../"); 
            
            }
            break;


        case "modify":
            //First check : if the user is logged.
            if(!empty($_SESSION['auth'])) {

                // Second check : if the user has the permission to modify a fireman.
                if (Auth::can(3)) { 
                    
                    call_user_func_array([new FiremanController(), "update"], $fragments); 
                
                }
                // If the user doesn't have the permission, we redirect to permission error page.
                else {

                    call_user_func_array([new FiremanController(), "error403"], $fragments);

                }

            }
            // If the user is not logged, we redirect to login page.
            else { 

                $_SESSION['notConnected'] = true;
                header("Location: ../../"); 

            }
            break;



        case "create":
            //First check : if the user is logged.
            if(!empty($_SESSION['auth'])) {

                // Second check : if the user has the permission to create a fireman.
                if(Auth::can(2)) {

                    call_user_func_array([new FiremanController(), "add"], $fragments);

                }
                // If the user doesn't have the permission, we redirect to permission error page.
                else { 
                    
                    call_user_func_array([new FiremanController(), "error403"], $fragments); 
                
                }

            }
            // If the user is not logged, we redirect to login page.
            else { 

                $_SESSION['notConnected'] = true;
                header("Location: ../../"); 

            }
            break;



        default:
            // If the URL doesn't exist we display the error page.
            call_user_func_array([new FiremanController(), "error404"], $fragments);
            break;


    }
}



function pompierRoutes_post($fragments) {


    $action = array_shift($fragments);

    switch ($action) {


        case "create":
            // If the user can create a fireman -> we allow the creation of the fireman using the information contained in $_POST.
            if(Auth::can(2)) { call_user_func_array([new FiremanController(), "insert"], $fragments); }

            // If the user can't create a fireman -> we display the permissions error page.
            else { call_user_func_array([new FiremanController(), "error403"], $fragments); }
            break;



        case "modify":
            // If the user can modify a fireman -> we allow the modification of the fireman using the information contained in $_POST.
            if(Auth::can(3)) { call_user_func_array([new FiremanController(), "alter"], $fragments); }

            // If the user can't create a fireman -> we display the permissions error page.
            else { call_user_func_array([new FiremanController(), "error403"], $fragments); }
            break;



        case "erase":
            // If the user can delete a fireman -> we allow the deletion of the fireman using the information contained in $_POST.
            if(Auth::can(4)) { call_user_func_array([new FiremanController(), "delete"], $fragments); }

            // If the user can't create a fireman -> we display the permissions error page.
            else { call_user_func_array([new FiremanController(), "error403"], $fragments); }
            break;



        default:
            // If the URL doesn't exist we display the error page.
            call_user_func_array([new FiremanController(), "error404"], $fragments);
            break;


    }
}



function caserneRoutes_get($fragments) {


    $action = array_shift($fragments);

    switch ($action) {


        case "display":
            //First check : if the user is logged.
            if(!empty($_SESSION['auth'])) {

                // Second check : if the user has the permission to see barracks.
                if(Auth::can(5)) {

                    call_user_func_array([new BarrackController(),"show"], $fragments);

                }
                // If the user doesn't have the permission, we redirect to permission error page.
                else { 
                    
                    call_user_func_array([new BarrackController(), "error403"], $fragments);
                
                }

            }
            // If the user is not logged, we redirect to login page.
            else { 

                $_SESSION['notConnected'] = true;
                header("Location: ../../"); 

            }
            break;



        case "expose":
            //First check : if the user is logged.
            if(!empty($_SESSION['auth'])) {

                // Second check : if the user has the permission to see details about barracks.
                if(Auth::can(5)) {

                    call_user_func_array([new BarrackController(),"visualize"], $fragments);

                }
                // If the user doesn't have the permission, we redirect to permission error page.
                else { 
                    
                    call_user_func_array([new BarrackController(), "error403"], $fragments);
                
                }

            }
            // If the user is not logged, we redirect to login page.
            else { 

                $_SESSION['notConnected'] = true;
                header("Location: ../../"); 

            }
            break;



        case "create" :
            //First check : if the user is logged.
            if(!empty($_SESSION['auth'])) {

                // Second check : if the user has the permission to create a barrack.
                if(Auth::can(6)) {

                    call_user_func_array([new BarrackController(),"add"], $fragments);

                }
                // If the user doesn't have the permission, we redirect to permission error page.
                else { 
                    
                    call_user_func_array([new BarrackController(), "error403"], $fragments);
                
                }

            }
            // If the user is not logged, we redirect to login page.
            else { 

                $_SESSION['notConnected'] = true;
                header("Location: ../../"); 

            }
            break;



        case "modify" :
            //First check : if the user is logged.
            if(!empty($_SESSION['auth'])) {

                // Second check : if the user has the permission to modify a barrack.
                if(Auth::can(7)) {

                    call_user_func_array([new BarrackController(),"update"], $fragments);

                }
                // If the user doesn't have the permission, we redirect to permission error page.
                else { 
                    
                    call_user_func_array([new BarrackController(), "error403"], $fragments);
                
                }

            }
            // If the user is not logged, we redirect to login page.
            else { 

                $_SESSION['notConnected'] = true;
                header("Location: ../../"); 

            }
            break;



        case "erase" :
            //First check : if the user is logged.
            if(!empty($_SESSION['auth'])) {

                // Second check : if the user has the permission to delete a barrack.
                if(Auth::can(8)) {

                    call_user_func_array([new BarrackController(),"delete"], $fragments);

                }
                // If the user doesn't have the permission, we redirect to permission error page.
                else { 
                    
                    call_user_func_array([new BarrackController(), "error403"], $fragments);
                
                }

            }
            // If the user is not logged, we redirect to login page.
            else { 

                $_SESSION['notConnected'] = true;
                header("Location: ../../"); 

            }
            break;



        default :
            // If the URL doesn't exist we display the error page.
            call_user_func_array([new BarrackController(), "error404"], $fragments);
            break;


    }
}



function caserneRoutes_post($fragments) {


    $action = array_shift($fragments);

    switch ($action) {


        case "create":
            // If the user can create a barrack -> we allow the creation of the barrack using the information contained in $_POST.
            if(Auth::can(6)) { call_user_func_array([new BarrackController(), "insert"], $fragments); }

            // If the user can't create a barrack -> we display the permissions error page.
            else { call_user_func_array([new BarrackController(), "error403"], $fragments); }            
            break;



        case "modify":
            // If the user can modify a fireman -> we allow the creation of the barrack using the information contained in $_POST.
            if(Auth::can(7)) { call_user_func_array([new BarrackController(), "alter"], $fragments); }

            // If the user can't create a fireman -> we display the permissions error page.
            else { call_user_func_array([new BarrackController(), "error403"], $fragments); }            
            break;



        default:
            // If the URL doesn't exist we display the error page.
            call_user_func_array([new BarrackController(), "error404"], $fragments);
            break;


    }
}



function usersRoutes_get($fragments) {


    $action = array_shift($fragments);

    switch ($action) {


        case "display":
            //First check : if the user is logged.
            if(!empty($_SESSION['auth'])) {

                // Second check : if the user has the permission to see the users.
                if(Auth::can(9)) {

                    call_user_func_array([new UserController(), "show"], $fragments);

                }
                // If the user doesn't have the permission, we redirect to permission error page.
                else { 
                    
                    call_user_func_array([new UserController(), "error403"], $fragments);
                
                }

            }
            // If the user is not logged, we redirect to login page.
            else { 

                $_SESSION['notConnected'] = true;
                header("Location: ../../"); 

            }
            break;



        default:
            // If the URL doesn't exist we display the error page.
            call_user_func_array([new UserController(), "error404"], $fragments);
            break;


    }

}



function usersRoutes_post($fragments) {


    $action = array_shift($fragments);

    switch ($action) {


        case "erase":
            // If the user can delete a user -> we allow the deletion of the user using the information contained in $_POST.
            if (Auth::can(12)) { call_user_func_array([new UserController(), "delete"], $fragments); }

            // If the user can't delete a user -> we display the permissions error page.
            else { call_user_func_array([new UserController(), "error403"], $fragments); }
            break;



        case "create":
            // If the user can create a user -> we allow the creation of the user using the information contained in $_POST.
            if (Auth::can(10)) { call_user_func_array([new UserController(), "insert"], $fragments); }

            // If the user can't create a user -> we display the permissions error page.
            else { call_user_func_array([new UserController(), "error403"], $fragments); }
            break;



        case "modify":
            // If the user can modify a user -> we allow the modification of the user using the information contained in $_POST.
            if (Auth::can(11)) { call_user_func_array([new UserController(), "update"], $fragments); }

            // If the user can't modify a user -> we display the permissions error page.
            else { call_user_func_array([new UserController(), "error403"], $fragments); }
            break;



        default:
            // If the URL doesn't exist we display the error page.
            call_user_func_array([new UserController(), "error404"], $fragments);
            break;


    }
}

function roleRoutes_get($fragments)
{
    $action = array_shift($fragments);
    switch ($action) {

        case "display":
            //First check : if the user is logged.
            if(!empty($_SESSION['auth'])) {

                // Second check : if the user has the permission to see the roles and permissions.
                if(Auth::can(13)) {

                    call_user_func_array([new RoleController(),"show"], $fragments);

                }
                // If the user doesn't have the permission, we redirect to permission error page.
                else { 
                    
                    call_user_func_array([new RoleController(),"error403"], $fragments);
                
                }

            }
            // If the user is not logged, we redirect to login page.
            else { 

                $_SESSION['notConnected'] = true;
                header("Location: ../../"); 

            }
            break;



        default :
            call_user_func_array([new RoleController(), "error404"], $fragments);
            break;

    }
}

function roleRoutes_post($fragments)
{
    $action = array_shift($fragments);
    switch ($action) {

        case "create":
            //First check : if the user is logged.
            if(!empty($_SESSION['auth'])) {

                // Second check : if the user has the permission to create a new role.
                if(Auth::can(14)) {

                    call_user_func_array([new RoleController(),"insert"], $fragments);

                }
                // If the user doesn't have the permission, we redirect to permission error page.
                else { 
                    
                    call_user_func_array([new RoleController(),"error403"], $fragments);
                
                }

            }
            // If the user is not logged, we redirect to login page.
            else { 

                $_SESSION['notConnected'] = true;
                header("Location: ../../"); 

            }
            break;



        case "modify":
            //First check : if the user is logged.
            if(!empty($_SESSION['auth'])) {

                // Second check : if the user has the permission to modify role / permissions.
                if(Auth::can(15)) {

                    call_user_func_array([new RoleController(),"alter"], $fragments);

                }
                // If the user doesn't have the permission, we redirect to permission error page.
                else { 
                    
                    call_user_func_array([new RoleController(),"error403"], $fragments);
                
                }

            }
            // If the user is not logged, we redirect to login page.
            else { 

                $_SESSION['notConnected'] = true;
                header("Location: ../../"); 

            }
            break;



        case "delete":
            //First check : if the user is logged.
            if(!empty($_SESSION['auth'])) {

                // Second check : if the user has the permission to delete a role.
                if(Auth::can(16)) {

                    call_user_func_array([new RoleController(),"erase"], $fragments);

                }
                // If the user doesn't have the permission, we redirect to permission error page.
                else { 
                    
                    call_user_func_array([new RoleController(),"error403"], $fragments);
                
                }

            }
            // If the user is not logged, we redirect to login page.
            else { 

                $_SESSION['notConnected'] = true;
                header("Location: ../../"); 

            }
            break;
        


        default:
        call_user_func_array([new RoleController(), "error404"], $fragments);
            break;


    }
}