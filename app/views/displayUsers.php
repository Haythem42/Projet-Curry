<?php
use app\models\Auth;
?>

<!DOCTYPE html>
    <html lang="en">
    <head>


        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="../css/userStyle.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="icon" type="image/x-icon" href="/img/role.ico" />

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <title>List of users</title>


    </head>



    <body style="background-color : #130f40">


        <!-- Feature : scroll to the top when clicking on the div -->
        <div class="scrollTop d-flex justify-content-center align-items-center" onclick="scrollToTop()">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-chevron-up" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z"/>
            </svg>
            <p style="color:black;font-size:25px;line-height:50px;margin-top:10px">TO TOP</p>
        </div>


        <header>


            <!-- Navbar -->
            <nav class="nav navbar-expand-lg">
                <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a class="nav-link px-5" href="/home/display">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link px-5" href="/fireman/display">Firemen</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link px-5" href="/barrack/display">Barracks</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link px-5" href="/user/display">Users</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link px-5" href="/role/display">Roles</a>
                        </li>

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
            </nav>


            <!-- Information about user displaying when clicking on image of the navbar -->
            <div class="userInfo" id="divUserInfo">
                <div class="d-flex">
                    <div class="avatar-big"></div>
                    <p class="user-text">
                        <?php echo(strtoupper($user->getRoleName())); ?> | <?php echo($user->getFirstName()); ?> <?php echo($user->getLastName()); ?><br>
                        <?php echo($user->getMail()); ?><br>
                        User#<?php echo($user->getId()); ?><br>
                    </p>
                </div>
                <div class="exit">
                    <a href="/connexion/disconnect" class="exit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open-fill" viewBox="0 0 16 16">
                            <path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
                        </svg>
                        Disconnect
                    </a>
                </div>
            </div>


            <!-- Background images of the header -->
            <div class="d-flex justify-content-center mainContainer" style="height:500px;">
                <div class="img" style="background-image : url(../img/admin.jpg);margin-top : 50px;"></div>
                <div class="img" style="background-image : url(../img/admin.jpg);margin-top : 100px;margin-right: 90px;margin-left: 90px;"></div>
                <div class="img" style="background-image : url(../img/admin.jpg);margin-top : 50px;"></div>
            </div>

        </header>


        <!-- Displaying error / succes messages -->
        <?php
        if(isset($_SESSION['result']) && $_SESSION['color'] == 'green'){ ?>

            <div class="resultDiv success flash" id="error">
                <p style="color:white;text-align:center;font-size:20px;line-height:50px;">
                    <?php echo($_SESSION['result']);?>
                </p>
            </div>

        <?php
        }

        if(isset($_SESSION['result']) && $_SESSION['color'] == 'red') { ?>

            <div class="resultDiv error flash" id="error">
                <p style="color:white;text-align:center;font-size:20px;line-height:50px;">
                    <?php echo($_SESSION['result']);?>
                </p>
            </div>

        <?php
        }

        unset($_SESSION['result']);
        unset($_SESSION['color']);

        ?>



        <div class="d-flex mainContainer" style="border-bottom: 2px solid white;margin-top:100px;">
            <div>
                <p class="title">User Management</p>
            </div>
            <button type="button" class="btn btn-info" style="color:white;" data-bs-toggle="modal" data-bs-target="#creationStaticBackdrop">
                Add User
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                </svg>
            </a>
        </div>



        <div class="container-fluid">
        <?php
        $i = 1;
        foreach($users as $user) {


            if($i == 1 || $i%3 == 1) {?>

                <div class="row" style="margin-bottom: 50px;margin-top: 50px;">
                    <div class="col-4">
                        <div class="card">
                            <div class="container">
                                <div class="picture"></div>
                                <div class="data">
                                    <p class="data-text">
                                    First name  •  <b><?php echo($user->getFirstName());?></b><br>
                                    Last name  •  <b><?php echo($user->getLastName());?></b><br>
                                    Role  • <b><?php echo($user->getRoleName()); ?></b><br><br>
                                    </p>
                                </div>
                            </div>
                            <div class="container d-flex justify-content-center" style="margin-top: 30px;">
                                <button class="btn btn-warning" id="<?php echo($user->getId());?>" data-bs-toggle="modal" data-bs-target="#modifyModal" onclick="fillId(this)">
                                    Edit user
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </button>
                                <button class="btn btn-danger" id="<?php echo($user->getId());?>" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="obtainId(this)">
                                    Delete user
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-dash" viewBox="0 0 16 16">
                                        <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                        <path fill-rule="evenodd" d="M11 7.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
            <?php
            }


            if($i%3 == 2){?>

                    <div class="col-4">
                        <div class="card">
                            <div class="container">
                                <div class="picture"></div>
                                <div class="data">
                                    <p class="data-text">
                                    First name  •  <b><?php echo($user->getFirstName());?></b><br>
                                    Last name  •  <b><?php echo($user->getLastName());?></b><br>
                                    Role  • <b><?php echo($user->getRoleName()); ?></b><br><br>
                                    </p>
                                </div>
                            </div>
                            <div class="container d-flex justify-content-center" style="margin-top: 30px;">
                                <button class="btn btn-warning" id="<?php echo($user->getId());?>" data-bs-toggle="modal" data-bs-target="#modifyModal" onclick="fillId(this)">
                                    Edit user
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </button>
                                <button class="btn btn-danger" id="<?php echo($user->getId());?>" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="obtainId(this)">
                                    Delete user
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-dash" viewBox="0 0 16 16">
                                        <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                        <path fill-rule="evenodd" d="M11 7.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
            <?php
            }


            if($i%3 == 0) {?>

                    <div class="col-4">
                        <div class="card">
                            <div class="container">
                                <div class="picture"></div>
                                <div class="data">
                                    <p class="data-text">
                                        First name  •  <b><?php echo($user->getFirstName());?></b><br>
                                        Last name  •  <b><?php echo($user->getLastName());?></b><br>
                                        Role  • <b><?php echo($user->getRoleName()); ?></b><br><br>
                                    </p>
                                </div>
                            </div>
                            <div class="container d-flex justify-content-center" style="margin-top: 30px;">
                                <button class="btn btn-warning" id="<?php echo($user->getId());?>" data-bs-toggle="modal" data-bs-target="#modifyModal" onclick="fillId(this)">
                                    Edit user
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </button>
                                <button class="btn btn-danger" id="<?php echo($user->getId());?>" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="obtainId(this)">
                                    Delete user
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-dash" viewBox="0 0 16 16">
                                        <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                        <path fill-rule="evenodd" d="M11 7.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
            }

            $i++;

        }
        ?>

        </div>

        
        <!-- Modal when someone wants to delete a user -->

        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Deleting a user</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        Are you sure you want to delete this user ?
                        <form action="/user/erase" method="POST">
                        <input type="number" class="form-control" id="idInput" name="idInput" hidden="true"/>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Confirm</button>
                    </div>
                        </form>
                </div>
            </div>
        </div>


        <!-- Modal when someone wants to create a new user -->
        <div class="modal fade" id="creationStaticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Creating a user</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <form action="/user/create" method="POST">

                            <div class="form-group">
                                <label for="emailC">Email address</label>
                                <input required type="email" class="form-control w-75" id="emailC"  name="emailC" placeholder="E-mail...">
                            </div><br>

                            <div class="form-group">
                                <label for="passwordC">Password</label>
                                <input required type="password" class="form-control w-75" id="passwordC" name="passwordC" placeholder="Password...">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="passwordBox" onclick="toggleVisibility()">
                                    <label class="form-check-label" for="passwordBox">
                                        Toggle visibility
                                    </label>
                                </div>
                            </div><br>

                            <div class="form-group">
                                <label for="firstNameC">First name</label>
                                <input required type="text" class="form-control w-75" id="firstNameC"  name="firstNameC" placeholder="First name...">
                            </div><br>

                            <div class="form-group">
                                <label for="lastNameC">Last name</label>
                                <input required type="text" class="form-control w-75" id="lastNameC"  name="lastNameC" placeholder="Last name...">
                            </div><br>

                            <div class="form-group">
                                <label for="roleId">Role id</label>
                                <input required type="number" class="form-control w-75" id="roleId"  name="roleId" min="1">
                            </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Confirm</button>
                    </div>
                        </form>
                </div>
            </div>
        </div>




        <!-- Modal when someone wants to modify a new user -->
        <div class="modal fade" id="modifyModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modify a user</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="/user/modify" method="POST">
                        <div class="form-group">
                            <label for="passwordM">Password</label>
                            <input required type="password" class="form-control w-75" id="passwordM" name="passwordM" placeholder="Password...">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="passwordBox" onclick="toggleVisibility()">
                                <label class="form-check-label" for="passwordBox">
                                    Toggle visibility
                                </label>
                            </div>
                            <input type="number" class="form-control" id="idInputModify" name="idInputModify" hidden="true"/>
                        </div><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Confirm</button>
                    </div>
                        </form>
                </div>
            </div>
        </div>



        <div class="separator"></div>

        <footer>
            <p style="text-align: center;color:white; font-size:20px;line-height:100px">Haythem & Quentin properties  |  All rights reserved ©</p>
        </footer>

        <script>

            // Scrolling to success / error message when this message exists.
            $(document).ready(function () {
                $('html, body').animate({
                    scrollTop: $('#error').offset().top
                }, 'slow');
            });



            // Function which give the user's id when someone want's to delete.
            function obtainId(e) {
                var id = e.id;
                document.getElementById("idInput").value = id;
            }


            // Function which fills id in the input fof the modify modal.
            function fillId(x) {
                var id = x.id;
                document.getElementById("idInputModify").value = id
            }



            // Function which toggle visibility for password input when creating a user.
            function toggleVisibility() {

                var x = document.getElementById("passwordC");
                var y = document.getElementById("passwordM");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }

                if (y.type === "password") {
                    y.type = "text";
                } else {
                    y.type = "password";
                }
                

            }


            // Function which redirect to the top of the page when the user clicks on the div "Scroll to top"
            function scrollToTop() {
                window.scrollTo({
                    top : 0
                })
            }



            // Waiting for the user to scroll down to show the div "Scroll to top"
            window.addEventListener('scroll', function()  {

                var scroll = document.querySelector('.scrollTop');
                scroll.classList.toggle('active', window.scrollY > 500);

            })



            // Function which matches information of the fireman with the input of the "show info" modal
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