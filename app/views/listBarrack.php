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
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="../">Home</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="../fireman/display">Firemen</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="">Barracks</a></li>
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
                        <div class="intro-button mx-auto"><a class="btn btn-primary btn-xl" href="#!">View the barrack's list!</a></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="page-section cta">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 mx-auto">
                        <div class="cta-inner bg-faded text-center rounded">
                            <h2 class="section-heading mb-4">
                                <span class="section-heading-upper">barrack's List</span>
                                <span class="section-heading-lower p-sm-2">

                                    <div class="d-grid gap-2 col-5 mx-auto">
                                    <a class="btn btn-primary" href="create">ADD  A NEW BARRACK</a>
                                    </div>

                                </span>
                            </h2>
                            <table class="table table-striped" id="myTable">
                                <thead>
                                    <tr>
                                        <th scope="col">NumCaserne</th>
                                        <th scope="col">Adresse</th>
                                        <th scope="col">CP</th>
                                        <th scope="col">Ville</th>
                                        <th scope="col">CodeTypeC</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                        <th scope="col">More</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach($listBarrack as $barrack) : ?>
                
                                    <tr>
                                        <!-- <th scope="row"></th> -->
                                        <td><?= $barrack->getNumCaserne(); ?></td>
                                        <td><?= $barrack->getAdresse(); ?></td>
                                        <td><?= $barrack->getCP(); ?></td>
                                        <td><?= $barrack->getVille(); ?></td>
                                        <td><?= $barrack->getCodeTypeC(); ?></td>
                                        <td><a class="btn btn-outline-secondary" href="modify/<?= $barrack->getNumCaserne() ?>">MODIFY</a></td>
                                        <td><a class="btn btn-outline-danger" href="erase/<?= $barrack->getNumCaserne() ?>">DELETE</a></td>
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
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="/js/scripts.js"></script>
    </body>
</html>