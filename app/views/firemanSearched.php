<!DOCTYPE html>

    <html lang="en">
    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/homeStyle.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

        <title>Research</title>

        <link rel="icon" type="image/x-icon" href="/img/fireman.ico" />

    </head>





    <body>

        <!-- PART : NAVIGATION BAR -->
        <header>


            <nav class="navbar navbar-expand yellow">
                <a class="navbar-brand" href="../../">CURRY PROJECT</a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item align-items-center">
                            <a class="nav-link" href="../..">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                                    <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
                                </svg>
                                HOME
                            </a>
                        </li>
                        <li class="nav-item align-items-center">
                            <a class="nav-link" href="../display">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                    <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                                    <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                                </svg>
                                FIREMEN
                            </a>
                        </li>
                        <li class="nav-item align-items-center">
                            <a class="nav-link" href="../../barrack/display">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                                </svg>
                                BARRACKS
                            </a>
                        </li>
                    </ul>
                </div>
            </nav><br>

            <div class="headerImg"></div>


        </header>




        <?php
        if (empty($firemen)) { ?>

            <div class="separator-150px"></div>

            <div class="container bg-light w-90 h-150px b-radius">
                <p class="text-center f-size-25px" style="line-height: 150px;">
                    Oopsi it seems like there is no fireman with the first name <?= $fragments ?> stored in the database...
                </p>
            </div>

            <div class="separator-150px"></div>

        <?php
        } else {?>

            <!-- PART : TITLE FIREMEN LIST -->
            <div class="separator-150px"></div>

            <div class="container grey w-circle h-35px b-radius"></div>
            <div class="container blue w-25 h-35px b-radius margin-t-5px"></div>
            <div class="container grey w-50 h-35px b-radius margin-t-5px"></div>


            <div class="container blue h-35px b-radius margin-t-5px">
                <h1 class="l-height-35px l-spacing f-size-30px text-center">RESULT(S) FOR <?= strtoupper($fragments) ?></h1>
            </div>


            <div class="container grey w-50 h-35px b-radius margin-t-5px"></div>
            <div class="container blue w-25 h-35px b-radius margin-t-5px"></div>
            <div class="container grey w-circle h-35px b-radius margin-t-5px"></div>

            <div class="container separator-150px"></div>


            

            <!-- PART : NEW FIREMAN BUTTON AND SEARCH BAR -->
            <div class="w-90 margin-r-5p f-r">
                <div class="flex justify-content-center">
                    <a href="../create" class="btn btn-success w-15 b-radius margin-r-80px">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                        </svg>
                        NEW FIREMAN
                    </a>
                    <input type="text" class="form-control w-15 shadow-none b-radius-left" placeholder="Search a first name" id="searchBar">
                    <button class="btn btn-info b-radius-right" onclick="search()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </button>
                </div> 
                <div class="separator-50px"></div>
                <div class="separator-50px"></div>
            </div>





            <!-- PART : DISPLAYING ALL THE FIREMEN MATCHING WITH THE RESEARCH -->
            <?php
            for ($i=0; $i < count($firemen); $i++) {?>

                <div class="container blue h-690px b-radius-right flex">
                    <div class="w-50 h-800px card-image margin-right-25px"></div>
                    <div class="w-90 h-800px b-radius-right">
                        <div class="separator-50px"></div>
                        <div class="container grey w-25 h-35px b-radius">
                            <h2 class="text-center l-height-35px f-size-25px">Result N°<?php echo($i+1)?></h2>
                        </div>
                        <div class="separator-50px"></div>
                        <div class="container l-blue w-70 b-radius-info">
                            <div class="separator-50px"></div>
                            <p class="firemanInfo">
                                <div class="container yellow w-75 h-35px b-radius">
                                    <h2 class="text-center l-height-35px f-size-25px">Information about the fireman</h2>
                                </div>
                                <div class="separator-50px"></div>
                                <ul>
                                    <li class="liste">Matricule = <b><?php echo($firemen[$i]->getMatricule());?></b></li>
                                    <li class="liste">First name = <b><?php echo($firemen[$i]->getPrenom());?></b></li>
                                    <li class="liste">Second name = <b><?php echo($firemen[$i]->getNom());?></b></li>
                                    <li class="liste">Chef agret = <b><?php echo($firemen[$i]->getChefAgret());?></b></li>
                                    <li class="liste">Birth date = <b><?php echo($firemen[$i]->getDateNaissance());?></b></li>
                                    <li class="liste">Barrack number = <b><?php echo($firemen[$i]->getNumCaserne());?></b></li>
                                    <li class="liste">Grade code = <b><?php echo($firemen[$i]->getCodeGrade());?></b></li>
                                    <li class="liste">Manager matricule = <b><?php echo($firemen[$i]->getMatriculeResponsable());?></b></li>
                                </ul>
                            </p>
                            <div class="separator-50px"></div>
                        </div>
                        <div class="separator-50px"></div>
                        <div class="flex justify-content-center">
                            <a href="../modify/<?php echo($firemen[$i]->getMatricule());?>" class="btn btn-warning w-25 b-radius margin-r-25px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                                MODIFY
                            </a>
                            <button type="button" class="btn btn-danger w-25 b-radius" id="<?php echo($firemen[$i]->getMatricule());?> "data-bs-toggle="modal" data-bs-target="#deleteModal"  onclick="matchId(this)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                </svg>
                                DELETE
                            </button>
                        </div>
                    </div>
                </div>
                <div class="container separator-150px"></div>





                <!-- PART : MODAL WHEN DELETING A FIREMAN -->
                <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center" id="staticBackdropLabel">Delete a fireman</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="separator-50px"></div>
                            ⚠️     Are you sure you want to delete this fireman ?     ⚠️
                            <div class="separator-50px"></div>
                            <form action="../erase" method="POST">
                                <input type="hidden" id="matriculeToDelete" name="matriculeToDelete">
                        </div>
                        <div class="modal-footer">
                            <div class="separator-50px"></div>
                            <div class="flex justify-content-center w-100">
                                <button type="button" class="btn btn-dark w-25 b-radius margin-r-25px" data-bs-dismiss="modal">Go back</button>
                                <button type="submit" class="btn btn-danger w-25 b-radius" name="buttonDelete">Delete</button>
                            </div>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>

        <?php
        }
        ?>
        




         <!-- PART : FOOTER -->
         <footer>


            <div class="container">
                <h2 class="l-height-80px f-size-25px text-center">Haythem & Quentin properties  |  All rights reserved ©</h2>
            </div>


        </footer>





        <!-- PART : SCRIPT JS  -->
        <script>

            function matchId(e) {

                var id = e.id;
                console.log(id);
                document.getElementById("matriculeToDelete").value = id;

            }

            function search() {

                var value = document.getElementById("searchBar").value;
                window.location.href = "http://127.0.0.1:8080/fireman/display/" + value ;

            }

        </script>
    </body>

</html>