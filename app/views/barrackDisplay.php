<?php
use app\models\Auth;
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>Barrack</title>

        <!-- Small icon of the website -->
        <link rel="icon" type="image/x-icon" href="/img/barrack.ico" />
        
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
        
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
        
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/css/barrackStyle.css" rel="stylesheet" />

    </head>

    <body>

        <!-- Header -->
            <header>
                <h1 class="site-heading text-center text-faded d-none d-lg-block">
                    <span class="site-heading-upper text-primary mb-3">CURRY PROJECT</span>
                    <span class="site-heading-lower">Curry Project</span>
                </h1>
            </header>

        <!-- Navigation Bar -->
            <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
                <div class="container">

                    <a class="navbar-brand text-uppercase fw-bold d-lg-none" href="/home/display">Curry Project</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto">
                            
                            <!-- Display Home section for all users -->
                                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/home/display">Home</a></li>
                            
                            <!-- Display navbar section in terms of their role -->
                                <?php if(Auth::can(1)): ?>
                                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/fireman/display">Firemen</a></li>
                                <?php endif ?>
                            
                                <?php if(Auth::can(5)): ?>
                                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/barrack/display">Barracks</a></li>
                                <?php endif ?>
                                
                                <?php if(Auth::can(9)): ?>
                                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/user/display">Users</a></li>
                                <?php endif ?>
                                
                                <?php if(Auth::can(13)): ?>
                                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/role/display">Roles</a></li>
                                <?php endif ?>
                            
                                <?php if(Auth::is_logged() == true): $user = Auth::user($_SESSION['auth'][0]); ?>
                                <div class="d-flex justify-content-center avatarContainer" onclick="showUserInfo();">
                                    <div class="avatar"></div>
                                    <div class="circle-connected"></div>
                                    <div class="p text-connected">Online</div>
                                </div>
                                <?php endif ?>

                        </ul>
                    </div>
                </div>
            </nav>

        <!-- Log information -->
            <div class="userInfo" id="divUserInfo">
                
            <!-- Information about the user logged -->
                <div class="d-flex">
                    <div class="avatar-big"></div>
                    <p class="user-text">
                        <?php echo(strtoupper($user->getRoleName())); ?> | <?php echo($user->getFirstName()); ?> <?php echo($user->getLastName()); ?><br>
                        <?php echo($user->getMail()); ?><br>
                        User#<?php echo($user->getId()); ?><br>
                    </p>
                </div>

            <!-- Log out -->
                <div class="exit">
                    <a href="/connexion/disconnect" class="exit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open-fill" viewBox="0 0 16 16">
                            <path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
                        </svg>
                        Disconnect
                    </a>
                </div>
    
            </div>

        <!-- Rest of the page -->
            <section class="page-section about-heading">

                <div class="container">
                    <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="/img/barrack-display.jpg" alt="..." />
                    
                    <div class="about-heading-content">
                        <div class="row">
                            <div class="col-xl-9 col-lg-10 mx-auto">
                                <div class="bg-faded rounded p-5">
                                    
                                    <h2 class="section-heading mb-4">
                                        <span class="section-heading-upper">More Information</span>
                                        <span class="section-heading-lower">Barrack n° <?= $barrack->getNumCaserne(); ?></span>
                                    </h2>
                                    
                                    <p>You can find this barrack at this address : <?= $barrack->getAdresse(); ?>, <?= $barrack->getCP() ?> <?= $barrack->getVille(); ?>.</p>
                                    
                                    <p class="mb-0">
                                        This barrack is made up of <?= $countFireman ?> firefighters.
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>

            </section>
        
        <!-- Footer -->
            <footer class="footer text-faded text-center py-5">
                <div class="container"><p class="m-0 small">Haythem & Quentin properties | All rights reserved &copy;</p></div>
            </footer>
        
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        
        <!-- Core theme JS-->
        <script src="/js/scriptBarrack.js"></script>

        <script>
            
            // Function which display/hide logged user information 
            function showUserInfo() {

                var div = document.querySelector(".userInfo");
                var isVisible = getComputedStyle(div).visibility;

                if ( isVisible == "hidden" ) {

                    document.getElementById("divUserInfo").style.setProperty("visibility", "visible");

                }

                if ( isVisible == "visible" ) {

                    document.getElementById("divUserInfo").style.setProperty("visibility", "hidden");

                }

            }

        </script>

    </body>
    
</html>