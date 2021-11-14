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
        <title>Create a new barrack</title>
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
        <header>
            <h1 class="site-heading text-center text-faded d-none d-lg-block">
                <span class="site-heading-upper text-primary mb-3">CURRY PROJECT</span>
                <span class="site-heading-lower">Curry Project</span>
            </h1>
        </header>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
            <div class="container">
                <a class="navbar-brand text-uppercase fw-bold d-lg-none" href="index.html">Curry Project</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="../../home/display">Home</a></li>
                        <?php if(Auth::has("Admin") || Auth::has("Manager F") || Auth::has("Employee")): ?>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="../../fireman/display">Firemen</a></li>
                        <?php endif ?>
                        <?php if(Auth::has("Admin") || Auth::has("Manager B") || Auth::has("Employee")): ?>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="../display">Barracks</a></li>
                        <?php endif ?>
                        <?php if(Auth::has("Admin")): ?>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="../../user/display">Users</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="../../role/display">Roles</a></li>
                        <?php endif ?>
                        <?php if(Auth::is_logged() == true): ?>
                        <li class="nav-item px-lg-4">
                            <p class="nav-link text-uppercase">
                            LOGGED AS : <?php echo($_SESSION['auth'][1]." ".$_SESSION['auth'][2]);?>
                            </p>
                        </li>
                        <li class="nav-item px-lg-4">
                            <a href="../../connexion/disconnect" class="nav-link text-uppercase">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                                    <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                                </svg>
                                DISCONNECT
                            </a>
                        </li>
                        <?php endif ?>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="page-section cta">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 mx-auto">
                        <div class="cta-inner bg-faded text-center rounded">
                            <h2 class="section-heading mb-5">
                                <span class="section-heading-upper">Fill new information about the barrack</span>
                                <span class="section-heading-lower">Update Barrack</span>
                            </h2>
                            <form action="modify" method="POST" class="col-md-10 m-auto mt-3">
                               
                            <div class="brd">
                                <div>
                                    <label for="numBarrack" class="form-label">Numéro de caserne</label>
                                    <input name="numBarrack" class="form-control" type="text" id="numBarrack" value="<?= $barrack->getNumCaserne(); ?>" pattern="{1,200}" readonly>
                                </div>


                                <div class="py-4">
                                    <div class="row g-3">
                                        <div class="col-md-4 col-sm-12">
                                            <label for="adresse" class="form-label">Adresse</label>
                                            <input name="adresseCaserne" type="text" class="form-control" id="adresse" value="<?= $barrack->getAdresse(); ?>" required>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <label for="CP" class="form-label">Code Postal</label>
                                            <input name="CP" type="text" class="form-control" id="CP" value="<?= $barrack->getCP(); ?>" required>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <label for="ville" class="form-label">Ville</label>
                                            <input name="ville" type="text" class="form-control" id="ville" value="<?= $barrack->getVille(); ?>" required>
                                        </div>
                                    </div>
                                </div>


                                <div>
                                    <label for="codeTypeC" class="form-label">Numéro du type de caserne</label>
                                    <input name="codeTypeC" class="form-control" type="text" id="codeTypeC" value="<?= $barrack->getCodeTypeC(); ?>" required>
                                </div>
                            </div>

                            <div class="py-4">
                            <button type="submit" class="btn btn-primary">Save modification</button>
                            </div>

                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <footer class="footer text-faded text-center py-5">
            <div class="container"><p class="m-0 small">Haythem & Quentin properties | All rights reserved &copy;</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="/js/scriptBarrack.js"></script>
    </body>
</html>