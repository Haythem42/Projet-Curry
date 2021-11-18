<?php
use app\models\Auth;
?>

<!DOCTYPE html>

    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/homeStyle.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
        <link rel="icon" type="image/x-icon" href="/img/fireman.ico" />

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <title>Creation</title>

        <script type="text/javascript">

            $(document).ready(function () {
                // Handler for .ready() called.
                $('html, body').animate({
                    scrollTop: $('#top').offset().top
                }, 'slow');
            });

        </script>

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
                            <a class="nav-link" href="../home/display">
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
                            <a class="nav-link" href="user/display">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                </svg>
                                USERS
                            </a>
                        </li>
                        <?php endif ?>
                        <?php if(Auth::has("Admin") == true): ?>
                        <li class="nav-item align-items-center">
                            <a class="nav-link" href="role/display">
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
                        <div class="d-flex justify-content-center avatarContainer" onclick="showUserInfo();">
                            <div class="avatar"></div>
                            <div class="circle-connected"></div>
                            <div class="p text-connected">Online</div>
                        </div>
                        <?php endif ?>
                    </ul>
                </div>
            </nav><br>
            <div class="headerImg"></div>
            <div class="userInfo yellow" id="divUserInfo">
                <div class="d-flex yellow">
                    <div class="avatar-big"></div>
                    <p class="user-text">
                        <?php echo(strtoupper($user->getRoleName())); ?> | <?php echo($user->getFirstName()); ?> <?php echo($user->getLastName()); ?><br>
                        <?php echo($user->getMail()); ?><br>
                        User#<?php echo($user->getId()); ?><br>
                    </p>
                </div>
                <div class="exit">
                    <a href="../../connexion/disconnect" class="exit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open-fill" viewBox="0 0 16 16">
                            <path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
                        </svg>
                        Disconnect
                    </a>
                </div>
            </div>


        </header>





        <!-- PART : TITLE CREATE FIREMAN -->

        <div class="separator-150px"></div>
        
        <div class="container green w-circle h-35px b-radius" id="top"></div>
        <div class="container blue w-25 h-35px b-radius margin-t-5px"></div>
        <div class="container green w-50 h-35px b-radius margin-t-5px"></div>


        <div class="container blue h-35px b-radius margin-t-5px">
            <h1 class="l-height-35px l-spacing f-size-30px text-center">CREATE A NEW FIREMAN</h1>
        </div>


        <div class="container green w-50 h-35px b-radius margin-t-5px"></div>
        <div class="container blue w-25 h-35px b-radius margin-t-5px"></div>
        <div class="container green w-circle h-35px b-radius margin-t-5px"></div>


        <div class="container separator-150px"></div>


        <?php if(isset($_SESSION['filterMessage']) && $_SESSION['color'] == "red"): ?>
        <div class="container b-radius flash">
            <div class="alert alert-danger text-center">
                <?php echo($_SESSION['filterMessage']); ?>
            </div>
        </div>
        <?php endif; ?>
        <?php   unset($_SESSION['filterMessage']);
                unset($_SESSION['color']);
        ?>


        <!-- PART : EMPTY FORM WHERE USER CAN FILL WITH INFORMATION -->
        <div class="container bg-light b-radius">

            <div class="separator-50px"></div>

            <div class="separator-50px"></div>


            <div class="flex">
                <div class="container blue w-circle h-35px b-radius"></div>
                <div class="container blue w-50 h-35px b-radius">
                    <h2 class="l-height-35px f-size-25px text-center">Fill information about the new fireman</h2>
                </div>
                <div class="container blue w-circle h-35px b-radius"></div>
            </div>

            <div class="separator-50px"></div>

            <div class="separator-50px"></div>


            <form action="create"  method="POST" id="creationFireman">

                <div class="container w-50 d-flex justify-content-center">
                    <div class="form-group w-50">
                        <?php 
                        if (isset($_SESSION['checkCreation'])) {
                            if($_SESSION['checkCreation']['matriculeInput'] == true) {?>
                                <label for="matriculeInput">Matricule *</label>
                                <input type="text" class="form-control b-radius true" name="matriculeInput" value="<?php echo($_SESSION['addUserValue']['matriculeInput'])?>">
                            <?php
                            } else { ?>
                                <label for="matriculeInput">Matricule *</label>
                                <input type="text" class="form-control b-radius false" name="matriculeInput" value="<?php echo($_SESSION['addUserValue']['matriculeInput'])?>">
                            <?php
                            }
                            ?>
                        <?php
                        } else {?>
                            <label for="matriculeInput">Matricule *</label>
                            <input type="text" class="form-control b-radius" name="matriculeInput">
                        <?php
                        }?>
                    </div>
                </div>

                <div class="separator-50px"></div>

                <div class="row">
                    <div class="col">
                        <?php 
                        if (isset($_SESSION['checkCreation'])) {
                            if($_SESSION['checkCreation']['firstNameInput'] == true) {?>
                                <label for="firstNameInput">First name *</label>
                                <input type="text" class="form-control w-75 b-radius true" name="firstNameInput" value="<?php echo($_SESSION['addUserValue']['firstNameInput'])?>">
                            <?php
                            } else { ?>
                                <label for="firstNameInput">First name *</label>
                                <input type="text" class="form-control w-75 b-radius false" name="firstNameInput" value="<?php echo($_SESSION['addUserValue']['firstNameInput'])?>">
                            <?php
                            }
                            ?>
                        <?php
                        } else {?>
                            <label for="firstNameInput">First name *</label>
                            <input type="text" class="form-control w-75 b-radius" name="firstNameInput">
                        <?php
                        }?>
                    </div>
                    <div class="col">
                        <?php 
                        if (isset($_SESSION['checkCreation'])) {
                            if($_SESSION['checkCreation']['lastNameInput'] == true) {?>
                                <label for="lastNameInput">Last name *</label>
                                <input type="text" class="form-control w-75 b-radius true" name="lastNameInput" value="<?php echo($_SESSION['addUserValue']['lastNameInput'])?>">
                            <?php
                            } else { ?>
                                <label for="lastNameInput">Last name *</label>
                                <input type="text" class="form-control w-75 b-radius false" name="lastNameInput" value="<?php echo($_SESSION['addUserValue']['lastNameInput'])?>">
                            <?php
                            }
                            ?>
                        <?php
                        } else {?>
                            <label for="lastNameInput">Last name *</label>
                            <input type="text" class="form-control w-75 b-radius" name="lastNameInput">
                        <?php
                        }?>
                    </div>
                </div><br><br>

                <div class="row">
                    <div class="col">
                        <?php 
                        if (isset($_SESSION['checkCreation'])) {
                            if($_SESSION['checkCreation']['chefAgretInput'] == true) {?>
                                <label for="chefAgretInput">Chef Agret *</label>
                                <input type="text" class="form-control w-75 b-radius true" name="chefAgretInput" value="<?php echo($_SESSION['addUserValue']['chefAgretInput'])?>">
                            <?php
                            } else { ?>
                                <label for="chefAgretInput">Chef Agret *</label>
                                <input type="text" class="form-control w-75 b-radius false" name="chefAgretInput" value="<?php echo($_SESSION['addUserValue']['chefAgretInput'])?>">
                            <?php
                            }
                            ?>
                        <?php
                        } else {?>
                            <label for="chefAgretInput">Chef Agret *</label>
                            <input type="text" class="form-control w-75 b-radius" name="chefAgretInput">
                        <?php
                        }?>
                    </div>
                    <div class="col">
                        <?php 
                        if (isset($_SESSION['checkCreation'])) {
                            if($_SESSION['checkCreation']['birthDateInput'] == true) {?>
                                <label for="birthDateInput">Birth date *</label>
                                <input type="date" class="form-control w-75 b-radius true" name="birthDateInput" value="<?php echo($_SESSION['addUserValue']['birthDateInput'])?>">
                            <?php
                            } else { ?>
                                <label for="birthDateInput">Birth date *</label>
                                <input type="date" class="form-control w-75 b-radius false" name="birthDateInput" value="<?php echo($_SESSION['addUserValue']['birthDateInput'])?>">
                            <?php
                            }
                            ?>
                        <?php
                        } else {?>
                            <label for="birthDateInput">Birth date *</label>
                            <input type="date" class="form-control w-75 b-radius" name="birthDateInput">
                        <?php
                        }?>
                    </div>
                </div><br><br>

                <div class="row">
                    <div class="col">
                        <?php 
                        if (isset($_SESSION['checkCreation'])) {
                            if($_SESSION['checkCreation']['numberBarrackInput'] == true) {?>
                                <label for="numberBarrackInput">Barrack number *</label>
                                <input type="number" class="form-control w-75 b-radius true" name="numberBarrackInput" value="<?php echo($_SESSION['addUserValue']['numberBarrackInput'])?>">
                            <?php
                            } else { ?>
                                <label for="numberBarrackInput">Barrack number *</label>
                                <input type="number" class="form-control w-75 b-radius false" name="numberBarrackInput" value="<?php echo($_SESSION['addUserValue']['numberBarrackInput'])?>">
                            <?php
                            }
                            ?>
                        <?php
                        } else {?>
                            <label for="numberBarrackInput">Barrack number *</label>
                            <input type="number" class="form-control w-75 b-radius" name="numberBarrackInput">
                        <?php
                        }?>
                    </div>
                    <div class="col">
                        <?php 
                        if (isset($_SESSION['checkCreation'])) {
                            if($_SESSION['checkCreation']['gradeInput'] == true) {?>
                                <label for="gradeInput">Grade code *</label>
                                <input type="text" class="form-control w-75 b-radius true" name="gradeInput" value="<?php echo($_SESSION['addUserValue']['gradeInput'])?>">
                            <?php
                            } else { ?>
                                <label for="gradeInput">Grade code *</label>
                                <input type="text" class="form-control w-75 b-radius false" name="gradeInput" value="<?php echo($_SESSION['addUserValue']['gradeInput'])?>">
                            <?php
                            }
                            ?>
                        <?php
                        } else {?>
                            <label for="gradeInput">Grade code *</label>
                            <input type="text" class="form-control w-75 b-radius" name="gradeInput">
                        <?php
                        }?>
                    </div>
                </div><br><br>

                <div class="container w-50 d-flex justify-content-center">
                    <div class="form-group w-50">
                        <?php 
                        if (isset($_SESSION['checkCreation'])) {
                            if($_SESSION['checkCreation']['matriculeManagerInput'] == true) {?>
                                <label for="matriculeManagerInput">Matricule manager *</label>
                                <input type="text" class="form-control b-radius true" name="matriculeManagerInput" value="<?php echo($_SESSION['addUserValue']['matriculeManagerInput'])?>">
                            <?php
                            } else { ?>
                                <label for="matriculeManagerInput">Matricule manager *</label>
                                <input type="text" class="form-control b-radius false" name="matriculeManagerInput" value="<?php echo($_SESSION['addUserValue']['matriculeManagerInput'])?>">
                            <?php
                            }
                            ?>
                        <?php
                        } else {?>
                            <label for="matriculeManagerInput">Matricule manager *</label>
                            <input type="text" class="form-control b-radius" name="matriculeManagerInput">
                        <?php
                        }?>
                    </div>
                </div><br><br><br><br>

                <div class="d-flex justify-content-center align-items-center">
                    <a href="display" class="btn btn-dark w-25 b-radius margin-r-25px">GO BACK</a>
                    <button type="submit" class="btn btn-success w-25 b-radius">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                        </svg>
                        ADD FIREMAN
                    </a>
                </div>

                <div class="separator-50px"></div>

                <div class="separator-50px"></div>

            </form>

        </div>

        <div class="separator-150px"></div>


        <?php
        unset($_SESSION['checkCreation']);
        unset($_SESSION['addUserValue']);
        ?>


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

            function showUserInfo() {

                var div = document.querySelector(".userInfo");
                var isVisible = getComputedStyle(div).visibility;

                if(isVisible == "hidden") {

                    document.getElementById("divUserInfo").style.setProperty("visibility", "visible");

                }

                if(isVisible == "visible") {

                    document.getElementById("divUserInfo").style.setProperty("visibility", "hidden");

                }

            }
        </script>

    </body>

</html>