<?php
use app\models\Auth;
?>

<!DOCTYPE html>

    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>


        <link rel="icon" type="image/x-icon" href="/img/home.ico" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/homeStyle.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </head>


    <body>

        <div class="scrollTop d-flex justify-content-center align-items-center" onclick="scrollToTop()">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-chevron-up" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z"/>
            </svg>
            <p class="l-height-50px f-size-30px margin-t-15px margin-l-10px">TO TOP</p>
        </div>

    <!-- PART : NAVIGATION BAR -->
        <header>


            <nav class="navbar navbar-expand yellow">
                <p class="navbar-brand">CURRY PROJECT</p>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item align-items-center">
                            <a class="nav-link" href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                                    <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
                                </svg>
                                HOME
                            </a>
                        </li>
                        <?php if(Auth::has("Admin") || Auth::has("Manager F") || Auth::has("Employee")): ?>
                        <li class="nav-item align-items-center">
                            <a class="nav-link" href="../fireman/display">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                    <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                                    <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                                </svg>
                                FIREMEN
                            </a>
                        </li>
                        <?php endif ?>
                        <?php if(Auth::has("Admin") || Auth::has("Manager B") || Auth::has("Employee")): ?>
                        <li class="nav-item align-items-center">
                            <a class="nav-link" href="../barrack/display">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                                </svg>
                                BARRACKS
                            </a>
                        </li>
                        <?php endif ?>
                        <?php if(Auth::has("Admin") == true): ?>
                        <li class="nav-item align-items-center">
                            <a class="nav-link" href="../user/display">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                </svg>
                                USERS
                            </a>
                        </li>
                        <?php endif ?>
                        <?php if(Auth::has("Admin") == true): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../role/display">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                </svg>
                                ROLES
                            </a>
                        </li>
                        <?php endif ?>
                        <?php if(Auth::is_logged() == true): ?>
                        <?php $user = Auth::user($_SESSION['auth'][0]); ?>
                        <div class="d-flex avatarContainer">
                            <div class="avatar"></div>
                            <div class="circle-connected"></div>
                            <div class="p text-connected">Online</div>
                        </div>
                        <?php endif ?>
                        <!-- <li class="nav-item align-items-center">
                            <p class="nav-link">
                            LOGGED AS : <?php ;?>
                            </p>
                        </li>
                        <li class="nav-item align-items-center">
                            <a href="../connexion/disconnect" class="nav-link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                                    <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                                </svg>
                                DISCONNECT
                            </a>
                        </li> -->
                        <!-- echo($_SESSION['auth'][1]." ".$_SESSION['auth'][2]) -->
                    </ul>
                </div>
            </nav><br>
            <div class="headerImg"></div>


        </header>





        <!-- PART : TITLE ABOUT CURRY PROJECT -->
        <div class="separator-150px"></div>

        <div class="container yellow w-circle h-35px b-radius"></div>
        <div class="container blue w-25 h-35px b-radius margin-t-5px"></div>
        <div class="container yellow w-50 h-35px b-radius margin-t-5px"></div>


        <div class="container blue h-35px b-radius margin-t-5px">
            <h1 class="l-height-35px l-spacing f-size-30px text-center">
        </div>


        <div class="container yellow w-50 h-35px b-radius margin-t-5px"></div>
        <div class="container blue w-25 h-35px b-radius margin-t-5px"></div>
        <div class="container yellow w-circle h-35px b-radius margin-t-5px"></div>

        <div class="container separator-150px"></div>


            


        <!-- PART : INFORMATION ABOUT THE CURRY PROJECT -->
        <div class="flex">
            <div class="red w-40 h-35px b-radius margin-r-25px"></div>
            <div class="red w-circle h-35px b-radius"></div>
        </div>

        <div class="flex margin-t-5px">
            <div class="yellow w-50 h-35px b-radius margin-r-25px"></div>
            <div class="yellow w-circle h-35px b-radius"></div>
        </div>


        <div class="container blue h-50px b-radius margin-t-15px">
            <h2 class="l-height-50px f-size-25px text-center">The Curry project was made by Haythem & Quentin</h2>
        </div>
        <div class="container blue h-50px b-radius margin-t-15px">
            <h2 class="l-height-50px f-size-25px text-center">This project has been realised during our second year of BTS SIO</h2>
        </div>
        <div class="container blue h-50px b-radius margin-t-15px">
            <h2 class="l-height-50px f-size-25px text-center">The purpose was to discover the structure of a web application using MVC pattern</h2>
        </div>

            
        <div class="flex margin-t-15px">
            <div class="yellow w-50 h-35px b-radius margin-r-25px"></div>
            <div class="yellow w-circle h-35px b-radius"></div>
        </div>

        <div class="flex margin-t-5px">
            <div class="red w-40 h-35px b-radius margin-r-25px"></div>
            <div class="red w-circle h-35px b-radius"></div>
        </div>

        <div class="separator-250px"></div>





        <!-- PART : TITLE MAKE YOUR CHOICE -->
        
        <div class="container red w-circle h-35px b-radius"></div>
        <div class="container blue w-25 h-35px b-radius margin-t-5px"></div>
        <div class="container red w-50 h-35px b-radius margin-t-5px"></div>


        <div class="container blue h-35px b-radius margin-t-5px">
            <h1 class="l-height-35px l-spacing f-size-30px text-center">MAKE YOUR CHOICE</h1>
        </div>


        <div class="container red w-50 h-35px b-radius margin-t-5px"></div>
        <div class="container blue w-25 h-35px b-radius margin-t-5px"></div>
        <div class="container red w-circle h-35px b-radius margin-t-5px"></div>

        <div class="separator-150px"></div>





        <!-- PART : FIREMEN AND BARRACKS DISPLAY -->
        <div class="flex">

            <!-- FIREMAN SECTION -->
            <div class="w-50 h-800px">

                <div class="flex justify-content-center">
                    <div class="red w-circle h-35px b-radius margin-r-25px"></div>
                    <div class="red w-50 h-35px b-radius margin-r-25px">
                        <h1 class="l-height-35px f-size-30px text-center">Firemen section</h1>
                    </div>
                    <div class="red w-circle h-35px b-radius"></div>
                </div>

                <div class="separator-50px"></div>

                <div class="firemanImg"></div>

                <div class="separator-50px"></div>

                <div class="d-flex align-items-center justify-content-center">
                    <a href="../fireman/display" class="btn btn-primary w-25 b-radius">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z"/>
                            <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z"/>
                        </svg>
                        Display firemen
                    </a>
                </div>

            </div>


            <!-- BARRACK SECTION -->
            <div class="w-50 h-800px">

                <div class="flex justify-content-center">
                    <div class="yellow w-circle h-35px b-radius margin-r-25px"></div>
                    <div class="yellow w-50 h-35px b-radius margin-r-25px">
                        <h1 class="l-height-35px f-size-30px text-center">Barracks section</h1>
                    </div>
                    <div class="yellow w-circle h-35px b-radius"></div>
                </div>

                <div class="separator-50px"></div>

                <div class="barrackImg"></div>

                <div class="separator-50px"></div>

                <div class="d-flex align-items-center justify-content-center">
                    <a href="../barrack/display" class="btn btn-secondary w-25 b-radius">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z"/>
                            <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z"/>
                        </svg>
                        Display barracks
                    </a>
                </div>

            </div>

        </div>

        <div class="separator-150px"></div>





        <!-- PART : FOOTER -->
        <footer>


           <div class="container">
               <h2 class="l-height-80px f-size-25px text-center">Haythem & Quentin properties  |  All rights reserved ©</h2>
           </div>


        </footer>


        <script>
            window.addEventListener('scroll', function()  {

                var scroll = document.querySelector('.scrollTop');
                scroll.classList.toggle('active', window.scrollY > 500);

            })

            function scrollToTop() {
                window.scrollTo({
                    top : 0
                })
            }
        </script>

    </body>

</html>