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
        <title>Barrack's List</title>
        <link rel="icon" type="image/x-icon" href="/img/barrack.ico" />

        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
        
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/css/barrackStyle.css" rel="stylesheet" />

        <!-- Datatables theme CSS (includes Bootstrap)-->
        <!-- <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"> -->
        
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
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="../home/display">Home</a></li>
                        <?php if(Auth::has("Admin") || Auth::has("Manager F") || Auth::has("Employee")): ?>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="../fireman/display">Firemen</a></li>
                        <?php endif ?>
                        <?php if(Auth::has("Admin") || Auth::has("Manager B") || Auth::has("Employee")): ?>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="">Barracks</a></li>
                        <?php endif ?>
                        <?php if(Auth::has("Admin")): ?>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="../user/display">Users</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="../role/display">Roles</a></li>
                        <?php endif ?>
                        <?php if(Auth::is_logged() == true): ?>
                        <?php $user = Auth::user($_SESSION['auth'][0]); ?>
                        <div class="d-flex avatarContainer">
                            <div class="avatar"></div>
                            <div class="circle-connected"></div>
                            <div class="p text-connected">Online</div>
                        </div>
                        <?php endif ?>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="page-section clearfix">
            <div class="container">
                <div class="intro">
                    <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="/img/barrack.png" alt="..." />
                    <div class="intro-text left-0 text-center bg-faded p-5 rounded">
                        <h2 class="section-heading mb-4">
                            <span class="section-heading-upper">Barrack's List</span>
                            <span class="section-heading-lower">Barrack's List</span>
                        </h2>
                        <p class="mb-3">You can see the barrack's list of our company!</p>
                        <div class="intro-button mx-auto"><a class="btn btn-primary btn-xl" href="#myTable">View the barrack's list!</a></div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="page-section cta">
            <?php if (isset($_SESSION['message']) && $_SESSION['color'] == "green"): ?>
                <div class="container flash" style="width : 30%;" id="error">
                    <div class="alert alert-success text-center">
                        <?php echo($_SESSION['message']); ?>
                    </div>
                </div>
            <?php  endif ?>
            <?php if (isset($_SESSION['message']) && $_SESSION['color'] == "red"): ?>
                <div class="container flash" style="width : 30%;" id="error">
                    <div class="alert alert-danger text-center">
                        <?php echo($_SESSION['message']); ?>
                    </div>
                </div>
            <?php endif ?>
            <?php if (isset($_SESSION['messageFilter']) && $_SESSION['color'] == "red"): ?>
                <div class="container flash" style="width : 30%;" id="error">
                    <div class="alert alert-danger text-center">
                        <?php echo($_SESSION['messageFilter']); ?>
                    </div>
                </div>
            <?php endif ?>
            <?php 
            unset($_SESSION['message']);
            unset($_SESSION['color']);
            ?>
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 mx-auto">
                        <div class="cta-inner bg-faded text-center rounded">
                            <h2 class="section-heading mb-4">
                                <span class="section-heading-upper">barrack's List</span>
                                <?php if(Auth::can(6)): ?>
                                <span class="section-heading-lower p-sm-2">

                                    <div class="d-grid gap-2 col-5 mx-auto">
                                    <a class="btn btn-primary" href="create">ADD A NEW BARRACK</a>
                                    </div>

                                </span>
                                <?php endif ?>
                            </h2>
                            <table class="table table-striped" id="myTable">
                                <thead>
                                    <tr>
                                        <th scope="col">Adresse</th>
                                        <th scope="col">CP</th>
                                        <th scope="col">Ville</th>
                                        <?php if(Auth::can(7)): ?>
                                        <th scope="col">Edit</th>
                                        <?php endif ?>
                                        <?php if(Auth::can(8)): ?>
                                        <th scope="col">Delete</th>
                                        <?php endif ?>
                                        <th scope="col">More</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach($listBarrack as $barrack) : ?>
                
                                    <tr>
                                        <!-- <th scope="row"></th> -->
                                        <!-- <td><?= $barrack->getNumCaserne(); ?></td> -->
                                        <td><?= $barrack->getAdresse(); ?></td>
                                        <td><?= $barrack->getCP(); ?></td>
                                        <td><?= $barrack->getVille(); ?></td>
                                        <!-- <td><?= $barrack->getCodeTypeC(); ?></td> -->
                                        <?php if(Auth::can(7)): ?>
                                        <td><a class="btn btn-outline-secondary" href="modify/<?= $barrack->getNumCaserne() ?>">MODIFY</a></td>
                                        <?php endif ?>
                                        <?php if(Auth::can(8)): ?>
                                        <td><a class="btn btn-outline-danger" href="erase/<?= $barrack->getNumCaserne() ?>">DELETE</a></td>
                                        <?php endif ?>
                                        <td><a class="btn btn-outline-dark" href="expose/<?= $barrack->getNumCaserne() ?>"> > </a></td>
                                    </tr>
                                    
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <footer class="footer text-faded text-center py-5">
            <div class="container"><p class="m-0 small">Haythem & Quentin properties | All rights reserved &copy;</p></div>
        </footer>

        <!-- Scroll top -->
        <a href="#" class="scrollup" id="scroll-up">
            <i class="uil uil-arrow-up scrollup__icon"></i>
        </a>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        
        <!-- Core theme JS-->
        <script src="/js/scriptBarrack.js"></script>

        <!-- Datatables JS -->
        <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

        <script>
            $(document).ready( function () {
                $('#myTable').DataTable();
            } );
        </script>
    
    </body>

</html>