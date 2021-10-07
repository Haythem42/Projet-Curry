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

        <title>Fireman list page</title>
    </head>





    <body>
        

        <!-- PART : NAVIGATION BAR -->
        <header>


            <nav class="navbar navbar-expand yellow">
                <a class="navbar-brand" href="../..">CURRY PROJECT</a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item align-items-center">
                            <a class="nav-link" href="../">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                                    <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
                                </svg>
                                HOME
                            </a>
                        </li>
                        <li class="nav-item align-items-center">
                            <a class="nav-link" href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                    <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                                    <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                                </svg>
                                FIREMEN
                            </a>
                        </li>
                        <li class="nav-item align-items-center">
                            <a class="nav-link" href="../barrack/display">
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





        <!-- PART : TITLE FIREMEN LIST -->
        <div class="separator-150px"></div>

        <div class="container red w-circle h-35px b-radius"></div>
        <div class="container blue w-25 h-35px b-radius margin-t-5px"></div>
        <div class="container red w-50 h-35px b-radius margin-t-5px"></div>


        <div class="container blue h-35px b-radius margin-t-5px">
            <h1 class="l-height-35px l-spacing f-size-30px text-center">FIREMEN LIST</h1>
        </div>


        <div class="container red w-50 h-35px b-radius margin-t-5px"></div>
        <div class="container blue w-25 h-35px b-radius margin-t-5px"></div>
        <div class="container red w-circle h-35px b-radius margin-t-5px"></div>

        <div class="container separator-150px"></div>





        <!-- PART : TABLE WHICH DISPLAY ALL THE FIREMEN -->
        <div class="w-90 margin-r-5p f-r">
            <div class="flex justify-content-center">
                <a href="create" class="btn btn-success w-15 b-radius margin-r-80px">NEW FIREMAN</a>
                <input type="text" class="form-control w-15 shadow-none b-radius" placeholder="Search"> 
            </div> 
        </div>


        <table class="table w-90 margin-l-5p" id="firemenTable">

            <thead>
                <tr>
                    <th scope="col" style="width : 5%;" class="text-center">#</th>
                    <th scope="col" style="width : 10%;" class="text-center">Matricule</th>
                    <th scope="col" style="width : 10%;" class="text-center">Prenom</th>
                    <th scope="col" style="width : 10%;" class="text-center">Nom</th>
                    <th scope="col" style="width : 5%;" class="text-center">Chef Agret</th>
                    <th scope="col" style="width : 10%;" class="text-center">Date de naissance</th>
                    <th scope="col" style="width : 5%;" class="text-center">Numero de caserne</th>
                    <th scope="col" style="width : 5%;" class="text-center">Code de grade</th>
                    <th scope="col" style="width : 10%;" class="text-center">Matricule du responsable</th>
                    <th scope="col" style="width : 10%;" class="text-center">Edit</th>
                    <th scope="col" style="width : 10%;" class="text-center">Delete</th>
                </tr>
            </thead>

            <tbody>
                <?php 
                for($i=0; $i < count($firemen);$i++) {
                ?>
                    <tr style="line-height : 75px;">
                        <th scope="row" class="text-center"><?php echo($i+1);?></th>
                        <td class="text-center"><?php echo($firemen[$i]->getMatricule());?></td>
                        <td class="text-center"><?php echo($firemen[$i]->getPrenom());?></td>
                        <td class="text-center"><?php echo($firemen[$i]->getNom());?></td>
                        <td class="text-center"><?php echo($firemen[$i]->getChefAgret());?></td>
                        <td class="text-center"><?php echo($firemen[$i]->getDateNaissance());?></td>
                        <td class="text-center"><?php echo($firemen[$i]->getNumCaserne());?></td>
                        <td class="text-center"><?php echo($firemen[$i]->getCodeGrade());?></td>
                        <td class="text-center"><?php echo($firemen[$i]->getMatriculeResponsable());?></td>
                        <td class="text-center"><a href="modify/<?php echo($firemen[$i]->getMatricule());?>" class="btn btn-warning w-75 b-radius">MODIFY</a></td>
                        <td class="text-center"><a href="erase/<?php echo($firemen[$i]->getMatricule());?>" class="btn btn-danger w-75 b-radius">DELETE</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>

        </table>

        <div class="separator-150px"></div>





        <!-- PART : FOOTER -->
        <footer>


            <div class="container">
                <h2 class="l-height-80px f-size-25px text-center">Haythem & Quentin properties  |  All rights reserved ©</h2>
            </div>

            
        </footer>

    </body>

</html>