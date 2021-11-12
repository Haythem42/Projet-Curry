<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Role's List</title>
        <link rel="icon" type="image/x-icon" href="/img/role.ico" />

        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

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
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="../barrack/display">Barracks</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="">Roles</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="../user/display">Users</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <section class="page-section cta">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 mx-auto">
                        <div class="cta-inner bg-faded text-center rounded">
                            <h2 class="section-heading mb-4">
                                <span class="section-heading-upper">Role's List</span>
                                <span class="section-heading-lower p-sm-2">

                                    <div class="d-grid gap-2 col-5 mx-auto">
                                    <a class="btn btn-primary" href="create">ADD A NEW ROLE</a>
                                    </div>

                                </span>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="page-section">
            <div class="container">
                <div class="product-item">
                    <div class="product-item-title d-flex">
                        <div class="bg-faded p-5 d-flex ms-auto rounded">
                            <h2 class="section-heading mb-0">
                                <span class="section-heading-upper text-center"><?= $roleList[0]->getId(); ?></span>
                                <span class="section-heading-lower"><?= $roleList[0]->getLibelle(); ?></span>
                            </h2>
                        </div>
                    </div>
                    <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="/img/manag.jpg" alt="..." />
                    <div class="product-item-description d-flex me-auto">
                        <div class="bg-faded p-5 rounded"><p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In eget aliquam lacus. Aliquam vel lacus lorem. Etiam id pretium nisl. Cras tempus turpis quis sem efficitur consectetur.</p></div>
                    </div>
                </div>
            </div>
        </section>

        <section class="page-section">
            <div class="container">
                <div class="product-item">
                    <div class="product-item-title d-flex">
                        <div class="bg-faded p-5 d-flex me-auto rounded">
                            <h2 class="section-heading mb-0">
                                <span class="section-heading-upper text-center"><?= $roleList[1]->getId(); ?></span>
                                <span class="section-heading-lower"><?= $roleList[1]->getLibelle(); ?></span>
                            </h2>
                        </div>
                    </div>
                    <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="/img/manag.jpg" alt="..." />
                    <div class="product-item-description d-flex ms-auto">
                        <div class="bg-faded p-5 rounded"><p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In eget aliquam lacus. Aliquam vel lacus lorem. Etiam id pretium nisl. Cras tempus turpis quis sem efficitur consectetur.</p></div>
                    </div>
                </div>
            </div>
        </section>

        <section class="page-section">
            <div class="container">
                <div class="product-item">
                    <div class="product-item-title d-flex">
                        <div class="bg-faded p-5 d-flex ms-auto rounded">
                            <h2 class="section-heading mb-0">
                                <span class="section-heading-upper text-center"><?= $roleList[2]->getId(); ?></span>
                                <span class="section-heading-lower"><?= $roleList[2]->getLibelle(); ?></span>
                            </h2>
                        </div>
                    </div>
                    <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="/img/manag.jpg" alt="..." />
                    <div class="product-item-description d-flex me-auto">
                        <div class="bg-faded p-5 rounded"><p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In eget aliquam lacus. Aliquam vel lacus lorem. Etiam id pretium nisl. Cras tempus turpis quis sem efficitur consectetur.</p></div>
                    </div>
                </div>
            </div>
        </section>

        <section class="page-section">
            <div class="container">
                <div class="product-item">
                    <div class="product-item-title d-flex">
                        <div class="bg-faded p-5 d-flex me-auto rounded">
                            <h2 class="section-heading mb-0">
                                <span class="section-heading-upper text-center"><?= $roleList[3]->getId(); ?></span>
                                <span class="section-heading-lower"><?= $roleList[3]->getLibelle(); ?></span>
                            </h2>
                        </div>
                    </div>
                    <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="/img/manag.jpg" alt="..." />
                    <div class="product-item-description d-flex ms-auto">
                        <div class="bg-faded p-5 rounded"><p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In eget aliquam lacus. Aliquam vel lacus lorem. Etiam id pretium nisl. Cras tempus turpis quis sem efficitur consectetur.</p></div>
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
        
        <!-- Core theme JS-->
        <script src="/js/scriptBarrack.js"></script>
    
    </body>
    
</html>