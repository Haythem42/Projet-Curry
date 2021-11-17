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
        <link rel="stylesheet" href="http://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"></script>
  

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="http://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

        <script>
            $(document).ready(function () {
                // Handler for .ready() called.
                $('html, body').animate({
                    scrollTop: $('#top').offset().top
                }, 'slow');
            });

        </script>


        <title>Firemen</title>
        <link rel="icon" type="image/x-icon" href="/img/fireman.ico" />
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
                            <a class="nav-link" href="">
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
                        <li class="nav-item align-items-center">
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
                    </ul>
                </div>
            </nav><br>

            <div class="headerImg"></div>


        </header>


        


        <!-- PART : TITLE FIREMEN LIST -->
        <div class="separator-150px"></div>

        <div class="container red w-circle h-35px b-radius" id="top"></div>
        <div class="container blue w-25 h-35px b-radius margin-t-5px"></div>
        <div class="container red w-50 h-35px b-radius margin-t-5px"></div>


        <div class="container blue h-35px b-radius margin-t-5px">
            <h1 class="l-height-35px l-spacing f-size-30px text-center">FIREMEN LIST</h1>
        </div>


        <div class="container red w-50 h-35px b-radius margin-t-5px"></div>
        <div class="container blue w-25 h-35px b-radius margin-t-5px"></div>
        <div class="container red w-circle h-35px b-radius margin-t-5px"></div>

        <div class="container separator-150px">
            <?php 
            if (isset($_SESSION['result']) && $_SESSION['color'] == "green") {?>

                <div class="container green h-50px margin-t-40px b-radius-error flash" id="error">
                    <p class="l-height-50px text-center f-size-25px" style="color : white;"><?php echo($_SESSION['result']);?></p>
                </div>

            <?php  
            }

            if (isset($_SESSION['result']) && $_SESSION['color'] == "red") {?>

                <div class="container red h-50px margin-t-40px b-radius-error flash" id="error">
                    <p class="l-height-50px text-center f-size-25px" style="color : white;"><?php echo($_SESSION['result']);?></p>
                </div>
            <?php
            }

            unset($_SESSION['result']);
            unset($_SESSION['color']);

            ?>
        </div>





        <!-- PART : TABLE WHICH DISPLAY ALL THE FIREMEN -->
        <?php if(Auth::can(2)): ?>
        <div class="w-90 f-r" style="margin-top: 20px;margin-right: 50px;">
            <div class="flex justify-content-center">
                <a href="create" class="btn btn-success w-15 b-radius margin-r-80px">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                    </svg>
                    NEW FIREMAN
                </a>
            </div>
            <div class="separator-50px"></div>
            <div class="separator-50px"></div>
        </div>
        <?php endif ?>



        <div class="container" style="background-color: white;border-radius: 2%; padding: 60px;">
        <table id="firemenTable">

            <thead>
                <tr>
                    <th scope="col" style="width : 5%;" class="text-center">#</th>
                    <th scope="col" style="width : 15%;" class="text-center">Matricule</th>
                    <th scope="col" style="width : 15%;" class="text-center">Prenom</th>
                    <th scope="col" style="width : 15%;" class="text-center">Nom</th>
                    <?php if(Auth::can(3)):?>
                    <th scope="col" style="width : 15%;" class="text-center">Edit</th>
                    <?php endif ?>
                    <?php if(Auth::can(4)):?>
                    <th scope="col" style="width : 15%;" class="text-center">Delete</th>
                    <?php endif ?>
                    <th scope="col" style="width : 20%;" class="text-center">Details</th>
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
                        <?php if(Auth::can(3)):?>
                        <td class="text-center">
                            <a href="modify/<?php echo($firemen[$i]->getMatricule());?>" class="btn btn-warning w-75 b-radius">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                                MODIFY
                            </a>
                        </td>
                        <?php endif ?>
                        <?php if(Auth::can(4)):?>
                        <td class="text-center">
                            <button type="button" class="btn btn-danger w-75 b-radius" id="<?php echo($firemen[$i]->getMatricule());?> " data-bs-toggle="modal" data-bs-target="#deleteModal"  onclick="matchId(this)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                </svg>
                                DELETE
                            </button>
                        </td>
                        <?php endif ?>
                        <td class="text-center">
                            <button type="button" class="btn btn-dark w-75 b-radius" id="<?php echo($i);?>" onclick="matchInfo(this);" data-bs-toggle="modal" data-bs-target="#showInfo">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                </svg>
                                SHOW INFO
                            </button>
                        </td>
                        <input type="text" id="info<?php echo($i); ?>" title="<?php echo($firemen[$i]->getMatricule());echo(","); echo($firemen[$i]->getPrenom());echo(","); echo($firemen[$i]->getNom());echo(","); echo($firemen[$i]->getChefAgret());echo(","); echo($firemen[$i]->getDateNaissance());echo(","); echo($firemen[$i]->getNumCaserne());echo(","); echo($firemen[$i]->getCodeGrade());echo(","); echo($firemen[$i]->getMatriculeResponsable());?>" hidden="true"/>
                    </tr>
                <?php
                }
                ?>
            </tbody>

        </table>
        </div>

        <div class="separator-150px"></div>




        
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
                    <form action="erase" method="POST">
                    <input type="hidden" id="matriculeToDelete" name="matriculeToDelete">
                </div>
                <div class="modal-footer">
                    <div class="separator-50px"></div>
                    <div class="flex justify-content-center w-100">
                        <button type="button" class="btn btn-dark w-25 b-radius margin-r-25px" data-bs-dismiss="modal">Go back</button>
                        <button type="submit" class="btn btn-danger w-25 b-radius" name="buttonDelete">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                            </svg>
                            DELETE
                        </button>
                    </div>
                    </form>
                </div>
                </div>
            </div>
        </div>


        <!-- PART : MODAL WHEN SHOWING INFORMATION A FIREMAN -->
        <div class="modal fade" id="showInfo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="staticBackdropLabel">Information about this fireman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="separator-50px"></div>
                        <div class="form-group">
                            <label for="matricule">Matricule</label>
                            <input type="text" class="form-control w-50" id="matricule" readonly>
                        </div><br>
                        <div class="form-group">
                            <label for="firstName">First name</label>
                            <input type="text" class="form-control w-50" id="firstName" readonly>
                        </div><br>
                        <div class="form-group">
                            <label for="lastName">Last name</label>
                            <input type="text" class="form-control w-50" id="lastName"  readonly>
                        </div><br>
                        <div class="form-group">
                            <label for="chefAgret">Chef agret</label>
                            <input type="text" class="form-control w-50" id="chefAgret" readonly>
                        </div><br>
                        <div class="form-group">
                            <label for="chefAgret">Birth date</label>
                            <input type="date" class="form-control w-50" id="birthDate" readonly>
                        </div><br>
                        <div class="form-group">
                            <label for="barrackNumber">Barrack's number</label>
                            <input type="number" class="form-control w-50" id="barrackNumber" readonly>
                        </div><br>
                        <div class="form-group">
                            <label for="gradeCode">Grade code</label>
                            <input type="text" class="form-control w-50" id="gradeCode" readonly>
                        </div><br>
                        <div class="form-group">
                            <label for="managerMatricule">Manager matricule</label>
                            <input type="text" class="form-control w-50" id="managerMatricule" readonly>
                        </div><br>
                    <div class="separator-50px"></div>
                </div>
                <div class="modal-footer"></div>
                </div>
            </div>
        </div>






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

            window.addEventListener('scroll', function()  {

            var scroll = document.querySelector('.scrollTop');
            scroll.classList.toggle('active', window.scrollY > 500);

            })

            function scrollToTop() {
                window.scrollTo({
                    top : 0
                })
            }

            $(document).ready( function () {
                $('#firemenTable').DataTable({

                });
            } );

            function matchInfo(btn) {

                var idUser = btn.id;

                var information = document.getElementsByTagName("input");

                var input = document.getElementById("info" + idUser).title;

                var tableInformation = input.split(",");

                document.getElementById("matricule").value = tableInformation[0];
                document.getElementById("firstName").value = tableInformation[1];
                document.getElementById("lastName").value = tableInformation[2];
                document.getElementById("chefAgret").value = tableInformation[3];
                document.getElementById("birthDate").value = tableInformation[4];
                document.getElementById("barrackNumber").value = tableInformation[5];
                document.getElementById("gradeCode").value = tableInformation[6];
                document.getElementById("managerMatricule").value = tableInformation[7];



            }

        </script>


    </body>

</html>