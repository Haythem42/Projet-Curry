<?php

//https://www.youtube.com/watch?v=tbYa0rJQyoM
//https://www.youtube.com/watch?v=-iW6lo6wq1Y
//https://openclassrooms.com/fr/courses/2078536-developpez-votre-site-web-avec-le-framework-symfony2-ancienne-version/2079345-le-routeur-de-symfony2

//echo "<pre>" . print_r($_SERVER, true) . "<pre>";

require_once '../autoloader.php';

use app\controllers\FiremanController;
use app\controllers\BarrackController;
use app\controllers\UserController;
use app\controllers\RoleController;


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

    default :

        call_user_func_array([new BarrackController(), "error"], $fragments);
        break;
}


function defaultRoutes_get($fragments)
{
    call_user_func_array([new app\controllers\DefaultController(), "home"], $fragments);
}


function pompierRoutes_get($fragments)
{


    $action = array_shift($fragments);

    switch ($action) {


        case "display" :
            // html/fireman/display
            call_user_func_array([new FiremanController(), "show"], $fragments);
            break;
        
        case "modify":
            // html/fireman/modify
            call_user_func_array([new FiremanController(), "update"], $fragments);
            break;

        case "create":
            // html//fireman/create
            call_user_func_array([new FiremanController(), "add"], $fragments);
            break;

        default :
            call_user_func_array([new FiremanController(), "error"], $fragments);
            break;
        
    }
}

function pompierRoutes_post($fragments)
{

    $action = array_shift($fragments);

    switch ($action) {

        case "create":
            call_user_func_array([new FiremanController(), "insert"], $fragments);
            break;

        case "modify":
            call_user_func_array([new FiremanController(), "alter"], $fragments);
            break;

        case "erase":
            call_user_func_array([new FiremanController(), "delete"], $fragments);
            break;

        default:
            // echo "Action '$action' non defini <hr>";
            call_user_func_array([new FiremanController(), "error"], $fragments);
            break;


    }
}

function caserneRoutes_get($fragments)
{
    $action = array_shift($fragments);
    switch ($action) {

        case "display":

            call_user_func_array([new BarrackController(),"show"], $fragments);
            break;


        case "expose":

            call_user_func_array([new BarrackController(),"visualize"], $fragments);
            break;


        case "create" :
            
            //echo "Calling barrackController->del <hr>";
            call_user_func_array([new BarrackController(), "add"], $fragments);
            break;


        // case "create" :
            
        //     //echo "Calling barrackController->del <hr>";
        //     call_user_func_array([new BarrackController(), "insert"], $fragments);
        //     break;

        
        case "modify" :
        
            //http://127.0.0.1:8080/pompier/demo/1/45?p=2
            // echo "Calling barrackController->update <hr>";
            //var_dump($fragments);
            // appelle le contrôleur/la classe, la methode utilisee et les donnees/parametres a transferer
            call_user_func_array([new BarrackController(), "update"], $fragments);
            break;
        

        case "erase" :
        
            //echo "Calling pompierController->del <hr>";
            //Access permission can be checked here too
            call_user_func_array([new BarrackController(), "delete"], $fragments);
            break;
        
        

        default :
        
            // echo "Action '$action' non defini <hr>";
            // require 'error404.php';
            call_user_func_array([new BarrackController(), "error"], $fragments);
            break;
            //Gestion du probleme
        
            
    }
}

function caserneRoutes_post($fragments)
{
    $action = array_shift($fragments);
    switch ($action) {

        case "create":
            //Access permission can be checked here too
            call_user_func_array([new BarrackController(), "insert"], $fragments);
            break;


        // case "expose":

        //     call_user_func_array([new BarrackController(), "poster"], $fragments);
        //     break;


        case "modify":
            //Access permission can be checked here too
            call_user_func_array([new BarrackController(), "alter"], $fragments);
            break;

            
        default:
            // echo "Action '$action' non defini <hr>";
            call_user_func_array([new BarrackController(), "error"], $fragments);
            break;


    }
}

function usersRoutes_get($fragments) {

    $action = array_shift($fragments);

    switch ($action) {

        case "display":
            call_user_func_array([new UserController(), "show"], $fragments);
            break;

        default:
            call_user_func_array([new UserController(), "error"], $fragments);
            break;
    }

}

function usersRoutes_post($fragments) {

    $action = array_shift($fragments);

    switch ($action) {

        case "erase":
            call_user_func_array([new UserController(), "delete"], $fragments);
            break;

        case "create":
            call_user_func_array([new UserController(), "insert"], $fragments);
            break;

        case "modify":
            call_user_func_array([new UserController(), "update"], $fragments);
            break;
        
        default:
            call_user_func_array([new UserController(), "error"], $fragments);
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