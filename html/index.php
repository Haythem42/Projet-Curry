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
            // Displaying the landing page after the user has logged in.
            call_user_func_array([new HomeController(), "home"], $fragments);
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
            // If the user can display the firemen -> we display the page.
            if (Auth::can(1)) { call_user_func_array([new FiremanController(), "show"], $fragments); }

            // If the user can't display the firemen -> we display the permissions error page.
            else { call_user_func_array([new FiremanController(), "error403"], $fragments); }
            break;



        case "modify":
            // If the user can modify a fireman -> we display the modification page.
            if (Auth::can(3)) { call_user_func_array([new FiremanController(), "update"], $fragments); }

            // If the user can't modify a fireman -> we display the permissions error page.
            else { call_user_func_array([new FiremanController(), "error403"], $fragments); }
            break;



        case "create":
            // If the user can create a fireman -> we display the creation page.
            if (Auth::can(2)) { call_user_func_array([new FiremanController(), "add"], $fragments); }

            // If the user can't display the firemen -> we display the permissions error page.
            else { call_user_func_array([new FiremanController(), "error403"], $fragments); }
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
            // If the user can display the barracks -> we display the page.
            if (Auth::can(5)) { call_user_func_array([new BarrackController(),"show"], $fragments); }

            // If the user can't display the barrakcs -> we display the permissions error page.
            else { call_user_func_array([new BarrackController(), "error403"], $fragments); }
            break;



        case "expose":
            // If the user can see the details about a barrack -> we display the details page.
            if (Auth::can(5)) { call_user_func_array([new BarrackController(),"visualize"], $fragments); }

            // If the user can't see the details about a barrack -> we display the permissions error page.
            else { call_user_func_array([new BarrackController(), "error403"], $fragments); }
            break;



        case "create" :
            // If the user can create a barrack -> we display the creation page.
            if (Auth::can(6)) { call_user_func_array([new BarrackController(),"add"], $fragments); }
            
            // If the user can't create a barrack -> we display the permissions error page.
            else { call_user_func_array([new BarrackController(), "error403"], $fragments); }
            break;



        case "modify" :
            // If the user can modify a barrack -> we display the modification page.
            if (Auth::can(7)) { call_user_func_array([new BarrackController(),"update"], $fragments); }
            
            // If the user can't modify a barrack -> we display the permissions error page.
            else { call_user_func_array([new BarrackController(), "error403"], $fragments); }
            break;


        case "erase" :
            // If the user can delete a barrack -> we allow the deletion of the barrack.
            if (Auth::can(8)) { call_user_func_array([new BarrackController(),"delete"], $fragments); }
            
            // If the user can't delete a barrack -> we display the permissions error page.
            else { call_user_func_array([new BarrackController(), "error403"], $fragments); }
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
            // If the user can display the users -> we display the page.
            if (Auth::can(9)) { call_user_func_array([new UserController(), "show"], $fragments); }

            // If the user can't display the users -> we display the permissions error page.
            else { call_user_func_array([new UserController(), "error403"], $fragments); }
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

            call_user_func_array([new RoleController(),"show"], $fragments);
            break;

        case "expose":

            call_user_func_array([new RoleController(),"visualize"], $fragments);
            break;

        case "create" :

            call_user_func_array([new RoleController(), "add"], $fragments);
            break;

        case "modify" :

            call_user_func_array([new RoleController(), "update"], $fragments);
            break;

        case "erase" :

            call_user_func_array([new RoleController(), "delete"], $fragments);
            break;

        default :

            call_user_func_array([new BarrackController(), "error"], $fragments);
            break;

    }
}

function roleRoutes_post($fragments)
{
    $action = array_shift($fragments);
    switch ($action) {

        case "create":

            call_user_func_array([new RoleController(), "insert"], $fragments);
            break;

        case "modify":

            call_user_func_array([new RoleController(), "alter"], $fragments);
            break;

        default:

        call_user_func_array([new BarrackController(), "error"], $fragments);
            break;


    }
}