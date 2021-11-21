<?php

    require_once '../autoloader.php';

    use app\controllers\FiremanController;
    use app\controllers\BarrackController;
    use app\controllers\UserController;
    use app\controllers\RoleController;
    use app\controllers\HomeController;
    use app\controllers\ConnexionController;
    use app\controllers\DefaultController;
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
            break;



        case "connexion":
            if($_SERVER["REQUEST_METHOD"] == "GET") {

                connexionRoutes_get($fragments);

            }
            break;
    }



    // URL : 127.0.0.1 --> display connexion.php (GET)
    function defaultRoutes_get($fragments) {

        call_user_func_array([new DefaultController(), "connexion"], $fragments);

    }



    // URL : 127.0.0.1/home/display --> display home.php (GET)
    function homeRoutes_get($fragments){

        $action = array_shift($fragments);

        switch($action) {


            case "display":
                // CHECK : user is logged ?
                if (!empty($_SESSION['auth'])) { 

                    call_user_func_array([new HomeController(), "home"], $fragments); 

                }
                // If user is not logged --> redirect to connexion.php
                else { 

                    $_SESSION['notConnected'] = true;
                    header("Location: /");
                    exit();

                }
                break;



            default:
                // If URL doesn't exist --> redirect to error404.php
                call_user_func_array([new Homecontroller(), "error404"], $fragments);
                break;
        }
    }



    // URL : 127.0.0.1/connexion/disconnect --> redirect to connexion.php (POST)
    function connexionRoutes_get($fragments){

        $action = array_shift($fragments);

        switch($action) {

            case "disconnect":
                // CHECK : user is logged ?
                if (Auth::is_logged()) { call_user_func_array([new ConnexionController(), "exit"], $fragments); }
                break;


            
            default:
                // If URL doesn't exist --> redirect to error404.php
                call_user_func_array([new ConnexionController(), "error404"], $fragments);
                break;
        }
    }



    // URL : 127.0.0.1/fireman/display --> display fireman.php (GET)
    // URL : 127.0.0.1/fireman/create --> display firemanCReate.php (GET)
    // URL : 127.0.0.1/fireman/modify/Matricule --> display firemanModify.php (GET)
    function pompierRoutes_get($fragments) {

        $action = array_shift($fragments);

        switch ($action) {

            case "display" :
                // CHECK N°1 : user is logged ?
                if(!empty($_SESSION['auth'])) {

                    // CHECK N°2 : user can see firemen ?
                    if(Auth::can(1)) { call_user_func_array([new FiremanController(), "show"], $fragments); }

                    // If user can't see firemen --> redirect to error403.php
                    else { call_user_func_array([new FiremanController(), "error403"], $fragments); }

                }
                // If user is not logged --> redirect to connexion.php
                else { 

                    $_SESSION['notConnected'] = true;
                    header("Location: /"); 
                
                }
                break;



            case "create":
                // CHECK N°1 : user is logged ?
                if(!empty($_SESSION['auth'])) {

                    // CHECK N°2 : user can create a fireman ?
                    if(Auth::can(2)) { call_user_func_array([new FiremanController(), "add"], $fragments); }

                    // If the user can't create a fireman --> redirect to error403.php
                    else { call_user_func_array([new FiremanController(), "error403"], $fragments); }

                }
                // If user is not logged --> redirect to connexion.php
                else { 

                    $_SESSION['notConnected'] = true;
                    header("Location: /"); 

                }
                break;



            case "modify":
                // CHECK N°1 : user is logged ?
                if(!empty($_SESSION['auth'])) {

                    // CHECK N°2 : user can modify firemen ?
                    if (Auth::can(3)) { call_user_func_array([new FiremanController(), "update"], $fragments); }

                    // If user can't modify firemen --> redirect to error403.php
                    else { call_user_func_array([new FiremanController(), "error403"], $fragments); }

                }
                // If user is not logged --> redirect to connexion.php
                else { 

                    $_SESSION['notConnected'] = true;
                    header("Location: /"); 

                }
                break;



            default:
                // If URL doesn't exist --> redirect to error404.php
                call_user_func_array([new FiremanController(), "error404"], $fragments);
                break;
        }
    }



    // URL : 127.0.0.1/fireman/create --> add fireman to DB (POST)
    // URL : 127.0.0.1/fireman/modify --> update fireman in DB (POST)
    // URL : 127.0.0.1/fireman/erase --> delete fireman from DB (POST)
    function pompierRoutes_post($fragments) {

        $action = array_shift($fragments);

        switch ($action) {

            case "create":
                // CHECK N°1 : user is logged ?
                if(!empty($_SESSION['auth'])) {

                    // CHECK N°2 : user can create a fireman ?
                    if(Auth::can(2)) { call_user_func_array([new FiremanController(), "insert"], $fragments); }

                    // If the user can't create a fireman --> redirect to error403.php
                    else { call_user_func_array([new FiremanController(), "error403"], $fragments); }

                }
                // If user is not logged --> redirect to connexion.php
                else { 

                    $_SESSION['notConnected'] = true;
                    header("Location: /"); 

                }
                break;



            case "modify":
                // CHECK N°1 : user is logged ?
                if(!empty($_SESSION['auth'])) {

                    // CHECK N°2 : user can modify firemen ?
                    if (Auth::can(3)) { call_user_func_array([new FiremanController(), "alter"], $fragments); }

                    // If user can't modify firemen --> redirect to error403.php
                    else { call_user_func_array([new FiremanController(), "error403"], $fragments); }

                }
                // If user is not logged --> redirect to connexion.php
                else { 

                    $_SESSION['notConnected'] = true;
                    header("Location: /"); 

                }
                break;



            case "erase":
                // CHECK N°1 : user is logged ?
                if(!empty($_SESSION['auth'])) {

                    // CHECK N°2 : user can delete a fireman ?
                    if (Auth::can(4)) { call_user_func_array([new FiremanController(), "delete"], $fragments); }

                    // If user can't delete a fireman --> redirect to error403.php
                    else { call_user_func_array([new FiremanController(), "error403"], $fragments); }

                }
                // If user is not logged --> redirect to connexion.php
                else { 

                    $_SESSION['notConnected'] = true;
                    header("Location: /"); 

                }
                break;



            default:
                // If URL doesn't exist --> redirect to error404.php
                call_user_func_array([new FiremanController(), "error404"], $fragments);
                break;
        }
    }



    // URL : 127.0.0.1/barrack/display --> display listBarrack.php (GET)
    // URL : 127.0.0.1/barrack/expose/Numero --> display barrackDisplay.php (GET)
    // URL : 127.0.0.1/barrack/create --> display barrackCreate.php (GET)
    // URL : 127.0.0.1/barrack/modify/Numero --> display barrackModify.php (GET)
    // URL : 127.0.0.1/barrack/erase --> delete barrack from DB (GET)
    function caserneRoutes_get($fragments) {

        $action = array_shift($fragments);

        switch ($action) {

            case "display":
                // CHECK N°1 : user is logged ?
                if(!empty($_SESSION['auth'])) {

                    // CHECK N°2 : user can see barracks ?
                    if(Auth::can(5)) { call_user_func_array([new BarrackController(),"show"], $fragments); }

                    // If user can't see barracks --> redirect to error403.php
                    else { call_user_func_array([new BarrackController(), "error403"], $fragments); }

                }
                // If user is not logged --> redirect to connexion.php
                else { 

                    $_SESSION['notConnected'] = true;
                    header("Location: /"); 

                }
                break;



            case "expose":
                // CHECK N°1 : user is logged ?
                if(!empty($_SESSION['auth'])) {

                    // CHECK N°2 : user can see barracks ?
                    if(Auth::can(5)) { call_user_func_array([new BarrackController(),"visualize"], $fragments); }

                    // If user can't see barracks --> redirect to error403.php
                    else { call_user_func_array([new BarrackController(), "error403"], $fragments); }

                }
                // If user is not logged --> redirect to connexion.php
                else { 

                    $_SESSION['notConnected'] = true;
                    header("Location: /"); 

                }
                break;



            case "create" :
                // CHECK N°1 : user is logged ?
                if(!empty($_SESSION['auth'])) {

                    // CHECK N°2 : user can create a barrack ?
                    if(Auth::can(6)) { call_user_func_array([new BarrackController(),"add"], $fragments); }

                    // If user can't create a barrack --> redirect to error403.php
                    else { call_user_func_array([new BarrackController(), "error403"], $fragments); }

                }
                // If user is not logged --> redirect to connexion.php
                else { 

                    $_SESSION['notConnected'] = true;
                    header("Location: /"); 

                }
                break;



            case "modify" :
                // CHECK N°1 : user is logged ?
                if(!empty($_SESSION['auth'])) {

                    // CHECK N°2 : user can modify a barrack ?
                    if(Auth::can(7)) { call_user_func_array([new BarrackController(),"update"], $fragments); }

                    // If user can't modify a barrack --> redirect to error403.php
                    else { call_user_func_array([new BarrackController(), "error403"], $fragments); }

                }
                // If user is not logged --> redirect to connexion.php
                else { 

                    $_SESSION['notConnected'] = true;
                    header("Location: /"); 

                }
                break;



            case "erase" :
                // CHECK N°1 : user is logged ?
                if(!empty($_SESSION['auth'])) {

                    // CHECK N°2 : user can delete a barrack ?
                    if(Auth::can(8)) {

                        call_user_func_array([new BarrackController(),"delete"], $fragments);

                    }
                    // If user can't delete a barrack --> redirect to error403.php
                    else { 
                        
                        call_user_func_array([new BarrackController(), "error403"], $fragments);
                    
                    }

                }
                // If user is not logged --> redirect to connexion.php
                else { 

                    $_SESSION['notConnected'] = true;
                    header("Location: /"); 

                }
                break;



            default :
                // If URL doesn't exist --> redirect to error404.php
                call_user_func_array([new BarrackController(), "error404"], $fragments);
                break;


        }
    }



    // URL : 127.0.0.1/barrack/create --> add fireman to DB (POST)
    // URL : 127.0.0.1/barrack/modify --> update barrack in DB (POST)
    function caserneRoutes_post($fragments) {

        $action = array_shift($fragments);

        switch ($action) {

            case "create":
                // CHECK N°1 : user is logged ?
                if(!empty($_SESSION['auth'])) {

                    // CHECK N°2 : user can create a barrack ?
                    if(Auth::can(6)) { call_user_func_array([new BarrackController(),"insert"], $fragments); }

                    // If user can't create a barrack --> redirect to error403.php
                    else { call_user_func_array([new BarrackController(), "error403"], $fragments); }

                }
                // If user is not logged --> redirect to connexion.php
                else { 

                    $_SESSION['notConnected'] = true;
                    header("Location: /"); 

                }
                break;



            case "modify":
                // CHECK N°1 : user is logged ?
                if(!empty($_SESSION['auth'])) {

                    // CHECK N°2 : user can modify a barrack ?
                    if(Auth::can(7)) { call_user_func_array([new BarrackController(),"alter"], $fragments); }

                    // If user can't modify a barrack --> redirect to error403.php
                    else { call_user_func_array([new BarrackController(), "error403"], $fragments); }

                }
                // If user is not logged --> redirect to connexion.php
                else { 

                    $_SESSION['notConnected'] = true;
                    header("Location: /"); 

                }
                break;



            default:
                // If URL doesn't exist --> redirect to error404.php
                call_user_func_array([new BarrackController(), "error404"], $fragments);
                break;
        }
    }



    // URL : 127.0.0.1/user/display --> displayUsers.php (GET)
    function usersRoutes_get($fragments) {

        $action = array_shift($fragments);

        switch ($action) {

            case "display":
                // CHECK N°1 : user is logged ?
                if(!empty($_SESSION['auth'])) {

                    // CHECK N°2 : user can see users ?
                    if(Auth::can(9)) { call_user_func_array([new UserController(), "show"], $fragments); }

                    // If user can't see users --> redirect to error403.php
                    else { call_user_func_array([new UserController(), "error403"], $fragments); }

                }
                // If user is not logged --> redirect to connexion.php
                else { 

                    $_SESSION['notConnected'] = true;
                    header("Location: /"); 

                }
                break;



            default:
                // If URL doesn't exist --> redirect to error404.php
                call_user_func_array([new UserController(), "error404"], $fragments);
                break;
        }
    }



    // URL : 127.0.0.1/user/create --> add user to DB (POST)
    // URL : 127.0.0.1/user/modify --> update user in DB (POST)
    // URL : 127.0.0.1/user/erase --> delete user from DB (POST)
    function usersRoutes_post($fragments) {

        $action = array_shift($fragments);

        switch ($action) {

            case "create":
                // CHECK N°1 : user is logged ?
                if(!empty($_SESSION['auth'])) {

                    // CHECK N°2 : user can create a user ?
                    if(Auth::can(10)) { call_user_func_array([new UserController(), "insert"], $fragments); }

                    // If user can't create a user --> redirect to error403.php
                    else { call_user_func_array([new UserController(), "error403"], $fragments); }

                }
                // If user is not logged --> redirect to connexion.php
                else { 

                    $_SESSION['notConnected'] = true;
                    header("Location: /"); 

                }
                break;



            case "modify":
                // CHECK N°1 : user is logged ?
                if(!empty($_SESSION['auth'])) {

                    // CHECK N°2 : user can modify a user ?
                    if(Auth::can(11)) { call_user_func_array([new UserController(), "update"], $fragments); }

                    // If user can't modify a user --> redirect to error403.php
                    else { call_user_func_array([new UserController(), "error403"], $fragments); }

                }
                // If user is not logged --> redirect to connexion.php
                else { 

                    $_SESSION['notConnected'] = true;
                    header("Location: /"); 

                }
                break;



            case "erase":
                // CHECK N°1 : user is logged ?
                if(!empty($_SESSION['auth'])) {

                    // CHECK N°2 : user can delete a user ?
                    if(Auth::can(12)) { call_user_func_array([new UserController(), "delete"], $fragments); }

                    // If user can't delete a user --> redirect to error403.php
                    else { call_user_func_array([new UserController(), "error403"], $fragments); }

                }
                // If user is not logged --> redirect to connexion.php
                else { 

                    $_SESSION['notConnected'] = true;
                    header("Location: /"); 

                }
                break;



            default:
                // If URL doesn't exist --> redirect to error404.php
                call_user_func_array([new UserController(), "error404"], $fragments);
                break;
        }
    }



    // URL : 127.0.0.1/role/display
    function roleRoutes_get($fragments) {

        $action = array_shift($fragments);

        switch ($action) {

            case "display":
                // CHECK N°1 : user is logged ?
                if(!empty($_SESSION['auth'])) {

                    // CHECK N°2 : user can see users ?
                    if(Auth::can(13)) { call_user_func_array([new RoleController(),"show"], $fragments); }

                    // If user can't see users --> redirect to error403.php
                    else { call_user_func_array([new RoleController(),"error403"], $fragments); }

                }
                // If user is not logged --> redirect to connexion.php
                else { 

                    $_SESSION['notConnected'] = true;
                    header("Location: /"); 

                }
                break;



            default :
                // If URL doesn't exist --> redirect to error404.php
                call_user_func_array([new RoleController(), "error404"], $fragments);
                break;
        }
    }



    // URL : 127.0.0.1/role/create --> add role to DB (POST)
    // URL : 127.0.0.1/role/modify --> update role and permissions in DB (POST)
    // URL : 127.0.0.1/role/delete --> delete role from DB (POST)
    function roleRoutes_post($fragments) {

        $action = array_shift($fragments);

        switch ($action) {

            case "create":
                // CHECK N°1 : user is logged ?
                if(!empty($_SESSION['auth'])) {

                    // CHECK N°2 : user can create a user ?
                    if(Auth::can(14)) { call_user_func_array([new RoleController(),"insert"], $fragments); }

                    // If user can't create a user --> redirect to error403.php
                    else { call_user_func_array([new RoleController(),"error403"], $fragments); }

                }
                // If user is not logged --> redirect to connexion.php
                else { 

                    $_SESSION['notConnected'] = true;
                    header("Location: /"); 

                }
                break;



            case "modify":
                // CHECK N°1 : user is logged ?
                if(!empty($_SESSION['auth'])) {

                    // CHECK N°2 : user can modify a user ?
                    if(Auth::can(15)) { call_user_func_array([new RoleController(),"alter"], $fragments); }

                    // If user can't modify a user --> redirect to error403.php
                    else { call_user_func_array([new RoleController(),"error403"], $fragments); }

                }
                // If user is not logged --> redirect to connexion.php
                else { 

                    $_SESSION['notConnected'] = true;
                    header("Location: /"); 

                }
                break;



            case "delete":
                // CHECK N°1 : user is logged ?
                if(!empty($_SESSION['auth'])) {

                    // CHECK N°2 : user can delete a user ?
                    if(Auth::can(16)) { call_user_func_array([new RoleController(),"erase"], $fragments); }

                    // If user can't delete a user --> redirect to error403.php
                    else { call_user_func_array([new RoleController(),"error403"], $fragments); }

                }
                // If user is not logged --> redirect to connexion.php
                else { 

                    $_SESSION['notConnected'] = true;
                    header("Location: /"); 

                }
                break;
            


            default:
                // If URL doesn't exist --> redirect to error404.php
                call_user_func_array([new RoleController(), "error404"], $fragments);
                break;
        }
    }

?>