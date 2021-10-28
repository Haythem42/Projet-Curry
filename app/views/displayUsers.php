<!DOCTYPE html>
    <html lang="en">
    <head>


        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="../css/userStyle.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <title>List of users</title>


    </head>



    <body style="background-color : #130f40">


        <div class="scrollTop d-flex justify-content-center align-items-center" onclick="scrollToTop()">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-chevron-up" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z"/>
            </svg>
            <p style="color:black;font-size:25px;line-height:50px;margin-top:10px">TO TOP</p>
        </div>


        <header>

            <nav class="nav navbar-expand-lg">
                <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link px-5" href="../..">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle px-5" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Firemen
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="../../fireman/display">Display all the firemen</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="../../fireman/create">Create a fireman</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle px-5" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Barracks
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="../../barrack/display">Display all the barracks</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="../../barrack/create">Create a barrack</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-5" href="">Users</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle px-5" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Permissions
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="../../permissions/display">Display all permissions</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="../../permissions/create">Create a permission</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="d-flex justify-content-center mainContainer" style="height:500px;">
                <div class="img" style="background-image : url(../img/admin.jpg);margin-top : 50px;"></div>
                <div class="img" style="background-image : url(../img/admin.jpg);margin-top : 100px;margin-right: 90px;margin-left: 90px;"></div>
                <div class="img" style="background-image : url(../img/admin.jpg);margin-top : 50px;"></div>
            </div>

        </header>

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
            <button type="button" class="btn btn-info" style="color:white;" data-bs-toggle="modal" data-bs-target="#createUserModal">
                Add User
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                </svg>
            </a>
        </div>


        <?php
        for($i=0;$i<count($fullUsers);$i++) {

            $index = $i+1;

            if($i%3 == 0) {

                echo(
                '<div class="user" style="clear:left;">
                    <div class="d-flex">
                        <div class="picture"></div>
                        <div class="containerData">
                            <p class="data" style="overflow-wrap: break-word;">
                                <div class="form-group">
                                    <label for="loginInput'.$index.'">Login</label>
                                    <input type="text" class="form-control" id="loginInput'.$index.'" readonly="true" value="'.$fullUsers[$i]->getLogin().'">
                                </div><br>
                                <div class="form-group">
                                    <label for="passwordInput'.$index.'">Password</label>
                                    <textarea class="form-control" id="passwordInput'.$index.'" rows="3" readonly>'.$fullUsers[$i]->getPassword().'</textarea>
                                </div><br>
                                <div class="form-group">
                                    <label for="roleInput'.$index.'">Role</label>
                                    <input type="text" class="form-control" id="RoleInput'.$index.'" readonly="true" value="'.$fullUsers[$i]->getRoleLibelle().'">
                                </div>
                                <input type="hidden" class="form-control" id="RoleIdInput'.$index.'" value="'.$fullUsers[$i]->getRoleId().'">
                            </p>
                        </div>
                    </div>
                    <div class="action d-flex justify-content-center">
                        <button type="button" class="btn btn-warning" id="'.$fullUsers[$i]->getId().'" data-bs-toggle="modal" data-bs-target="#modifyModal"  onclick="retrieveData(this)">
                            Edit
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </button>
                        <button type="button" class="btn btn-danger" id="'.$fullUsers[$i]->getId().'" data-bs-toggle="modal" data-bs-target="#deleteModal"  onclick="matchId(this)">
                            Delete
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-dash" viewBox="0 0 16 16">
                                <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                <path fill-rule="evenodd" d="M11 7.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
                            </svg>
                        </a>
                    </div>
                </div>');

            } else {

                echo(
                '<div class="user">
                    <div class="d-flex">
                        <div class="picture"></div>
                        <div class="containerData">
                            <p class="data" style="overflow-wrap: break-word;">
                                <div class="form-group">
                                    <label for="loginInput'.$index.'">Login</label>
                                    <input type="text" class="form-control" id="loginInput'.$index.'" readonly="true" value="'.$fullUsers[$i]->getLogin().'">
                                </div><br>
                                <div class="form-group">
                                    <label for="passwordInput'.$index.'">Password</label>
                                    <textarea class="form-control" id="passwordInput'.$index.'" rows="3" readonly>'.$fullUsers[$i]->getPassword().'</textarea>
                                </div><br>
                                <div class="form-group">
                                    <label for="roleInput'.$index.'">Role</label>
                                    <input type="text" class="form-control" id="roleInput'.$index.'" readonly="true" value="'.$fullUsers[$i]->getRoleLibelle().'">
                                </div>
                                <input type="hidden" class="form-control" id="RoleIdInput'.$index.'" value="'.$fullUsers[$i]->getRoleId().'">
                            </p>
                        </div>
                    </div>
                    <div class="action d-flex justify-content-center">
                        <button type="button" class="btn btn-warning" id="'.$fullUsers[$i]->getId().'" data-bs-toggle="modal" data-bs-target="#modifyModal"  onclick="retrieveData(this)">
                            Edit
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </button>
                        <button type="button" class="btn btn-danger" id="'.$fullUsers[$i]->getId().'" data-bs-toggle="modal" data-bs-target="#deleteModal"  onclick="matchId(this)">
                            Delete
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-dash" viewBox="0 0 16 16">
                                <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                <path fill-rule="evenodd" d="M11 7.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
                            </svg>
                        </button>
                    </div>
                </div>');
            }
        }
        ?>


        <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header d-block">
                    <h5 class="modal-title text-center" id="staticBackdropLabel">Delete a user</h5>
                </div>
                <div class="modal-body d-block">
                    <p class="text-center">Are you sure you want to delete this user ?</p>
                    <form action="erase" method="POST">
                        <input type="hidden" id="userToDelete" name="userToDelete">
                </div>
                <div class="modal-footer d-block">
                    <div class="d-flex justify-content-center w-100">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                            </svg>
                            Go back
                        </button>
                        <button type="submit" class="btn btn-danger" name="buttonDelete">
                            Delete
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-dash" viewBox="0 0 16 16">
                                <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                <path fill-rule="evenodd" d="M11 7.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
                            </svg>
                        </button>
                    </div>
                    </form>
                </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="createUserModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header d-block">
                    <h5 class="modal-title text-center" id="staticBackdropLabel">Create a user</h5>
                </div>
                <div class="modal-body d-block">
                    <form action="create" method="POST">
                    <div class="form-group" style="margin-left:250px;">
                        <label for="idInput">User ID</label>
                        <input type="number" class="form-control w-50" id="idInput" name="idInput" min="0">
                    </div><br>
                    <div class="form-group" style="margin-left:250px;">
                        <label for="loginInput">User login</label>
                        <input type="text" class="form-control w-50" id="loginInput" name="loginInput" placeholder="Enter a login">
                    </div><br>
                    <div class="form-group" style="margin-left:250px;">
                        <label for="passwordInput">Password</label>
                        <input type="password" class="form-control w-50" id="passwordInput" name="passwordInput" placeholder="Enter a password">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" onclick="toggleVisibility()">
                            <label class="form-check-label" for="flexCheckDefault">
                                Toggle password visibility
                            </label>
                        </div>
                    </div><br>
                    <div class="form-group" style="margin-left:250px;">
                        <label for="roleIdInput">User role ID</label>
                        <input type="number" class="form-control w-50" id="roleIdInput" name="roleIdInput" min="0">
                    </div>
                </div>
                <div class="modal-footer d-block">
                    <div class="d-flex justify-content-center w-100">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                            </svg>
                            Go back
                        </button>
                        <button type="submit" class="btn btn-success">
                            Add user
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                                <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                            </svg>
                        </button>
                    </div>
                    </form>
                </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="modifyModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header d-block">
                    <h5 class="modal-title text-center" id="staticBackdropLabel">Modify a user</h5>
                </div>
                <div class="modal-body d-block">
                    <form action="modify" method="POST">
                    <div class="form-group" style="margin-left:250px;">
                        <label for="idInputModify">User ID</label>
                        <input type="number" class="form-control w-50" id="idInputModify" name="idInputModify" min="0" readonly="true">
                    </div><br>
                    <div class="form-group" style="margin-left:250px;">
                        <label for="loginInputModify">User login</label>
                        <input type="text" class="form-control w-50" id="loginInputModify" name="loginInputModify" placeholder="Enter a login">
                    </div><br>
                    <div class="form-group" style="margin-left:250px;">
                        <label for="passwordInputModify">Password</label>
                        <input type="password" class="form-control w-50" id="passwordInputModify" name="passwordInputModify" placeholder="Enter a password">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" onclick="toggleVisibility()">
                            <label class="form-check-label" for="flexCheckDefault">
                                Toggle password visibility
                            </label>
                        </div>
                    </div><br>
                    <div class="form-group" style="margin-left:250px;">
                        <label for="roleIdInputModify">User role ID</label>
                        <input type="number" class="form-control w-50" id="roleIdInputModify" name="roleIdInputModify" min="0">
                    </div>
                </div>
                <div class="modal-footer d-block">
                    <div class="d-flex justify-content-center w-100">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                            </svg>
                            Go back
                        </button>
                        <button type="submit" class="btn btn-success">
                            Modify user
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </button>
                    </div>
                    </form>
                </div>
                </div>
            </div>
        </div>


        <div class="separator"></div>

        <footer>
            <p style="text-align: center;color:white; font-size:20px;line-height:100px">Haythem & Quentin properties  |  All rights reserved ©</p>
        </footer>

        <script>

            function matchId(e) {

                var id = e.id;
                console.log(id);
                document.getElementById("userToDelete").value = id;

            }

            function retrieveData(e) {

                var id = e.id

                var inputLogin = document.getElementById("loginInput"+id).value;
                var inputPassword = document.getElementById("passwordInput"+id).value;
                var inputRoleId = document.getElementById("RoleIdInput"+id).value;
                
                var modifyInputId = document.getElementById("idInputModify");
                var modifyInputLogin = document.getElementById("loginInputModify");
                var modifyInputPassword = document.getElementById("passwordInputModify");
                var modifyInputRole = document.getElementById("roleIdInputModify");

                modifyInputId.value = id;
                modifyInputLogin.value = inputLogin;
                modifyInputPassword.value = inputPassword;
                modifyInputRole.value = inputRoleId;
            }

            $(document).ready(function () {
                // Handler for .ready() called.
                $('html, body').animate({
                    scrollTop: $('#error').offset().top
                }, 'slow');
            });

            function scrollToTop() {
                window.scrollTo({
                    top : 0
                })
            }

            function toggleVisibility() {

                var input = document.getElementById("passwordInput");
                var input2 = document.getElementById("passwordInputModify");
                if (input.type === "password") {
                    input.type = "text";
                } else {
                    input.type = "password";
                }

                if (input2.type === "password") {
                    input2.type = "text";
                } else {
                    input2.type = "password";
                }
            }

            window.addEventListener('scroll', function()  {

                var scroll = document.querySelector('.scrollTop');
                scroll.classList.toggle('active', window.scrollY > 500);

            })

        </script>
    </body>
</html>