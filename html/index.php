<?php

//https://www.youtube.com/watch?v=tbYa0rJQyoM
//https://www.youtube.com/watch?v=-iW6lo6wq1Y
//https://openclassrooms.com/fr/courses/2078536-developpez-votre-site-web-avec-le-framework-symfony2-ancienne-version/2079345-le-routeur-de-symfony2

//echo "<pre>" . print_r($_SERVER, true) . "<pre>";

require_once '../autoloader.php';

use app\controllers\FiremanController;
use app\controllers\BarrackController;


if (isset($_SERVER["PATH_INFO"])) {
    $path = trim($_SERVER["PATH_INFO"], "/");
} else {
    $path = "";
}


$fragments = explode("/", $path);

//var_dump($fragment);

$control = array_shift($fragments);
//echo "control : $control <hr>";
switch ($control) {
    case '' :
    { //l'url est /
        defaultRoutes_get($fragments);
        break;
    }
    case "fireman" :
    {
        //echo "Gestion des routes pour pompier <hr>";
        //calling function to prevend all hard code here
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            pompierRoutes_get($fragments);
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            pompierRoutes_post($fragments);
        }
        break;
    }
    case "barrack" :
    {
        //echo "Gestion des routes pour caserne<hr>";
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            caserneRoutes_get($fragments);
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            caserneRoutes_post($fragments);
        }
        break;
    }
    default :
    {
        //Gestion du probleme
        echo "Erreur URL";
    }
}


function defaultRoutes_get($fragments)
{
    call_user_func_array(["BaseController", "home"], $fragments);
}


function pompierRoutes_get($fragments)
{

    //var_dump($fragment);

    $action = array_shift($fragments);
    //var_dump($action);

    switch ($action) {


        case "display" :
        
            //http://127.0.0.1:8080/pompier/show/5?p=25&a=12
            echo "Calling firemanController->show <hr>";
            call_user_func_array([new FiremanController(), "show"], $fragments);
            break;
        

        case "edit" :
            
            //echo "Calling pompierController->del <hr>";
            call_user_func_array([new FiremanController(), "insert"], $fragments);
            break;
            
    
        case "modify" :
        
            //http://127.0.0.1:8080/pompier/demo/1/45?p=2
            echo "Calling firemanController->update <hr>";
            //var_dump($fragments);
            // appelle le contrôleur/la classe, la methode utilisee et les donnees/parametres a transferer
            call_user_func_array([new FiremanController(), "update"], $fragments);
            break;
        

        case "delete" :
        
            //echo "Calling pompierController->del <hr>";
            //Access permission can be checked here too
            call_user_func_array([new FiremanController(), "delete"], $fragments);
            break;
        
        

        default :
        
            echo "Action '$action' non defini <hr>";
            //Gestion du probleme
        
    }
}

function pompierRoutes_post($fragments)
{

    $action = array_shift($fragments);
    switch ($action) {

        case "add":
            //Access permission can be checked here too
            call_user_func_array([new FiremanController(), "insert"], $fragments);
            break;


        case "modify":
            //Access permission can be checked here too
            call_user_func_array([new FiremanController(), "update"], $fragments);
            break;


        case "erase" :
            //echo "Action '$action' ready <hr>";
            //Access permission can be checked here too
            call_user_func_array([new FiremanController(), "delete"], $fragments);
            break;


        default:
            echo "Action '$action' non defini <hr>";
            break;


    }
}

function caserneRoutes_get($fragments)
{
    $action = array_shift($fragments);
    switch ($action) {


        case "edit" :
            
            //echo "Calling barrackController->del <hr>";
            call_user_func_array([new BarrackController(), "insert"], $fragments);
            break;
            
    
        case "modify" :
        
            //http://127.0.0.1:8080/pompier/demo/1/45?p=2
            echo "Calling barrackController->update <hr>";
            //var_dump($fragments);
            // appelle le contrôleur/la classe, la methode utilisee et les donnees/parametres a transferer
            call_user_func_array([new BarrackController(), "update"], $fragments);
            break;
        

        case "delete" :
        
            //echo "Calling pompierController->del <hr>";
            //Access permission can be checked here too
            call_user_func_array([new BarrackController(), "delete"], $fragments);
            break;
        
        

        default :
        
            echo "Action '$action' non defini <hr>";
            //Gestion du probleme
        


    }
}

function caserneRoutes_post($fragments)
{
    $action = array_shift($fragments);
    switch ($action) {
        case "add":
            //Access permission can be checked here too
            call_user_func_array([new BarrackController(), "insert"], $fragments);
            break;


        case "modify":
            //Access permission can be checked here too
            call_user_func_array([new BarrackController(), "update"], $fragments);
            break;


        case "erase" :
            //echo "Action '$action' ready <hr>";
            //Access permission can be checked here too
            call_user_func_array([new BarrackController(), "delete"], $fragments);
            break;

            
        default:
            echo "Action '$action' non defini <hr>";
            break;


    }
}
