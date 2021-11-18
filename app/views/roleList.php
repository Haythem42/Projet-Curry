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
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="../home/display">Home</a></li>
                        <?php if(Auth::has("Admin") || Auth::has("Manager F") || Auth::has("Employee")): ?>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="../fireman/display">Firemen</a></li>
                        <?php endif ?>
                        <?php if(Auth::has("Admin") || Auth::has("Manager B") || Auth::has("Employee")): ?>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="../barrack/display">Barracks</a></li>
                        <?php endif ?>
                        <?php if(Auth::has("Admin")): ?>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="../user/display">Users</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="">Roles</a></li>
                        <?php endif ?>
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
            </div>
        </nav>

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
                <a href="../../connexion/disconnect" class="exit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open-fill" viewBox="0 0 16 16">
                        <path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
                    </svg>
                    Disconnect
                </a>
            </div>
        </div>

        <!-- Create Modal -->
        <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="create" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="create">Create Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="create" method="POST">
                        <div class="form-group row">
                            <label for="role" class="col-sm-3 col-form-label">Role</label>
                            <div class="col-sm-9">
                                <input name="role" type="text" class="form-control" id="role" placeholder="Ex. : Admin" required>
                            </div>
                        </div><br>
                        <h4 class="text-center">Firemen permissions</h4><br>
                        <div class="form-group row">
                            <div class="col-sm-3">Permissions</div>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input type="hidden" name="boxF1" value="N"/>
                                    <input class="form-check-input" type="checkbox" id="createPermission" onclick="check(this);">
                                    <label class="form-check-label" for="createPermission">
                                    READ
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type="hidden" name="boxF2" value="N"/>
                                    <input class="form-check-input" type="checkbox" id="readPermission" onclick="check(this);">
                                    <label class="form-check-label" for="readPermission">
                                    CREATE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type="hidden" name="boxF3" value="N"/>
                                    <input class="form-check-input" type="checkbox" id="updatePermission" onclick="check(this);">
                                    <label class="form-check-label" for="updatePermission">
                                    UPDATE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type="hidden" name="boxF4" value="N"/>
                                    <input class="form-check-input" type="checkbox" id="deletePermission" onclick="check(this);">
                                    <label class="form-check-label" for="deletePermission">
                                    DELETE
                                    </label>
                                </div>
                            </div>
                        </div><br>
                        <h4 class="text-center">Barracks permissions</h4><br>
                        <div class="form-group row">
                            <div class="col-sm-3">Permissions</div>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input type="hidden" name="boxB1" value="N"/>
                                    <input class="form-check-input" type="checkbox" id="createPermission" onclick="check(this);">
                                    <label class="form-check-label" for="createPermission">
                                    READ
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type="hidden" name="boxB2" value="N"/>
                                    <input class="form-check-input" type="checkbox" id="readPermission"onclick="check(this);">
                                    <label class="form-check-label" for="readPermission">
                                    CREATE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type="hidden" name="boxB3" value="N"/>
                                    <input class="form-check-input" type="checkbox" id="updatePermission" onclick="check(this);">
                                    <label class="form-check-label" for="updatePermission">
                                    UPDATE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type="hidden" name="boxB4" value="N"/>
                                    <input class="form-check-input" type="checkbox" id="deletePermission" onclick="check(this);">
                                    <label class="form-check-label" for="deletePermission">
                                    DELETE
                                    </label>
                                </div>
                            </div>
                        </div><br>
                        <h4 class="text-center">User permissions</h4><br>
                        <div class="form-group row">
                            <div class="col-sm-3">Permissions</div>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input type="hidden" name="boxU1" value="N"/>
                                    <input class="form-check-input" type="checkbox" id="createPermission" onclick="check(this);">
                                    <label class="form-check-label" for="createPermission">
                                    READ
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type="hidden" name="boxU2" value="N"/>
                                    <input class="form-check-input" type="checkbox" id="readPermission" onclick="check(this);">
                                    <label class="form-check-label" for="readPermission">
                                    CREATE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type="hidden" name="boxU3" value="N"/>
                                    <input class="form-check-input" type="checkbox" id="updatePermission" onclick="check(this);">
                                    <label class="form-check-label" for="updatePermission">
                                    UPDATE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type="hidden" name="boxU4" value="N"/>
                                    <input class="form-check-input" type="checkbox" id="deletePermission" onclick="check(this);">
                                    <label class="form-check-label" for="deletePermission">
                                    DELETE
                                    </label>
                                </div>
                            </div>
                        </div><br>
                        <h4 class="text-center">Role permissions</h4><br>
                        <div class="form-group row">
                            <div class="col-sm-3">Permissions</div>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input type="hidden" name="boxR1" value="N"/>
                                    <input class="form-check-input" type="checkbox" id="createPermission" onclick="check(this);">
                                    <label class="form-check-label" for="createPermission">
                                    READ
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type="hidden" name="boxR2" value="N"/>
                                    <input class="form-check-input" type="checkbox" id="readPermission" onclick="check(this);">
                                    <label class="form-check-label" for="readPermission">
                                    CREATE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type="hidden" name="boxR3" value="N"/>
                                    <input class="form-check-input" type="checkbox" id="updatePermission" onclick="check(this);">
                                    <label class="form-check-label" for="updatePermission">
                                    UPDATE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type="hidden" name="boxR4" value="N"/>
                                    <input class="form-check-input" type="checkbox" id="deletePermission" onclick="check(this);">
                                    <label class="form-check-label" for="deletePermission">
                                    DELETE
                                    </label>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
                </form>
                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit">Edit Permissions</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="modify" method="POST">
                        <div class="form-group row">
                            <label for="id" class="col-sm-3 col-form-label">Id</label>
                            <div class="col-sm-9">
                                <input name="idModified" type="text" class="form-control" id="idModified" readonly>
                            </div>
                        </div><br>
                        <div class="form-group row">
                            <label for="role" class="col-sm-3 col-form-label">Role</label>
                            <div class="col-sm-9">
                                <input name="roleModified" type="text" class="form-control" id="roleModified" required>
                            </div>
                        </div><br>
                        <h4 class="text-center">Firemen permissions</h4><br>
                        <div class="form-group row">
                            <div class="col-sm-3">Permissions</div>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input type="hidden" name="boxModifiedInputF1" id="boxModifiedInputF1" value="N"/>
                                    <input class="form-check-input" type="checkbox" id="boxModifiedF1" onclick="check(this);">
                                    <label class="form-check-label" for="createPermission">
                                    READ
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type="hidden" name="boxModifiedInputF2" id="boxModifiedInputF2" value="N"/>
                                    <input class="form-check-input" type="checkbox" id="boxModifiedF2" onclick="check(this);">
                                    <label class="form-check-label" for="readPermission">
                                    CREATE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type="hidden" name="boxModifiedInputF3" id="boxModifiedInputF3" value="N"/>
                                    <input class="form-check-input" type="checkbox" id="boxModifiedF3" onclick="check(this);">
                                    <label class="form-check-label" for="updatePermission">
                                    UPDATE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type="hidden" name="boxModifiedInputF4" id="boxModifiedInputF4" value="N"/>
                                    <input class="form-check-input" type="checkbox" id="boxModifiedF4" onclick="check(this);">
                                    <label class="form-check-label" for="deletePermission">
                                    DELETE
                                    </label>
                                </div>
                            </div>
                        </div><br>
                        <h4 class="text-center">Barracks permissions</h4><br>
                        <div class="form-group row">
                            <div class="col-sm-3">Permissions</div>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input type="hidden" name="boxModifiedInputB1" id="boxModifiedInputB1" value="N"/>
                                    <input class="form-check-input" type="checkbox" id="boxModifiedB1" onclick="check(this);">
                                    <label class="form-check-label" for="createPermission">
                                    READ
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type="hidden" name="boxModifiedInputB2" id="boxModifiedInputB2" value="N"/>
                                    <input class="form-check-input" type="checkbox" id="boxModifiedB2"onclick="check(this);">
                                    <label class="form-check-label" for="readPermission">
                                    CREATE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type="hidden" name="boxModifiedInputB3" id="boxModifiedInputB3" value="N"/>
                                    <input class="form-check-input" type="checkbox" id="boxModifiedB3" onclick="check(this);">
                                    <label class="form-check-label" for="updatePermission">
                                    UPDATE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type="hidden" name="boxModifiedInputB4" id="boxModifiedInputB4" value="N"/>
                                    <input class="form-check-input" type="checkbox" id="boxModifiedB4" onclick="check(this);">
                                    <label class="form-check-label" for="deletePermission">
                                    DELETE
                                    </label>
                                </div>
                            </div>
                        </div><br>
                        <h4 class="text-center">User permissions</h4><br>
                        <div class="form-group row">
                            <div class="col-sm-3">Permissions</div>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input type="hidden" name="boxModifiedInputU1" id="boxModifiedInputU1" value="N"/>
                                    <input class="form-check-input" type="checkbox" id="boxModifiedU1" onclick="check(this);">
                                    <label class="form-check-label" for="createPermission">
                                    READ
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type="hidden" name="boxModifiedInputU2" id="boxModifiedInputU2" value="N"/>
                                    <input class="form-check-input" type="checkbox" id="boxModifiedU2" onclick="check(this);">
                                    <label class="form-check-label" for="readPermission">
                                    CREATE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type="hidden" name="boxModifiedInputU3" id="boxModifiedInputU3" value="N"/>
                                    <input class="form-check-input" type="checkbox" id="boxModifiedU3" onclick="check(this);">
                                    <label class="form-check-label" for="updatePermission">
                                    UPDATE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type="hidden" name="boxModifiedInputU4" id="boxModifiedInputU4" value="N"/>
                                    <input class="form-check-input" type="checkbox" id="boxModifiedU4" onclick="check(this);">
                                    <label class="form-check-label" for="deletePermission">
                                    DELETE
                                    </label>
                                </div>
                            </div>
                        </div><br>
                        <h4 class="text-center">Role permissions</h4><br>
                        <div class="form-group row">
                            <div class="col-sm-3">Permissions</div>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input type="hidden" name="boxModifiedInputR1" id="boxModifiedInputR1" value="N"/>
                                    <input class="form-check-input" type="checkbox" id="boxModifiedR1" onclick="check(this);">
                                    <label class="form-check-label" for="createPermission">
                                    READ
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type="hidden" name="boxModifiedInputR2" id="boxModifiedInputR2" value="N"/>
                                    <input class="form-check-input" type="checkbox" id="boxModifiedR2" onclick="check(this);">
                                    <label class="form-check-label" for="readPermission">
                                    CREATE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type="hidden" name="boxModifiedInputR3" id="boxModifiedInputR3" value="N"/>
                                    <input class="form-check-input" type="checkbox" id="boxModifiedR3" onclick="check(this);">
                                    <label class="form-check-label" for="updatePermission">
                                    UPDATE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type="hidden" name="boxModifiedInputR4" id="boxModifiedInputR4" value="N"/>
                                    <input class="form-check-input" type="checkbox" id="boxModifiedR4" onclick="check(this);">
                                    <label class="form-check-label" for="deletePermission">
                                    DELETE
                                    </label>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
                </div>
            </div>
        </div>


        <!-- Delete Modal -->
        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit">Delete role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="delete" method="POST">
                    Are you sure you want to delete this role ?
                    <input type="hidden" id="roleDelete" name="roleDelete"/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Confirm</button>
                </div>
                </form>
                </div>
            </div>
        </div>
        
        <section class="page-section cta">
        <?php   if(isset($_SESSION['filterMessage']) && $_SESSION['color'] == "red"): ?>
            <div class="container flash" style="width : 30%;">
                <div class="alert alert-danger text-center">
                    <?php echo($_SESSION['filterMessage']); ?>
                </div>
            </div>         
        <?php  endif; ?>
        <?php 
            if (isset($_SESSION['result']) && $_SESSION['color'] == "green") {?>

            <div class="container flash" style="width : 30%;">
                <div class="alert alert-success text-center">
                    <?php echo($_SESSION['result']); ?>
                </div>
            </div>   

            <?php  
            }

            if (isset($_SESSION['result']) && $_SESSION['color'] == "red") {?>

            <div class="container flash" style="width : 30%;">
                <div class="alert alert-danger text-center">
                    <?php echo($_SESSION['result']); ?>
                </div>
            </div> 
            <?php
            }

            unset($_SESSION['result']);
            unset($_SESSION['color']);
            unset($_SESSION['filterMessage']);
            ?>
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 mx-auto">
                        <div class="cta-inner bg-faded text-center rounded">
                            <h2 class="section-heading mb-4">
                                <span class="section-heading-upper">Role's List</span>
                                <span class="section-heading-lower p-sm-2">

                                    <div class="d-grid gap-2 col-5 mx-auto">
                                    <a class="btn btn-primary" data-toggle="modal" data-target="#create">ADD A NEW ROLE</a>
                                    </div>

                                </span>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <?php $count = 0;
        foreach($roleList as $role) {

        if ($count%2 == 0) { ?>

            <section class="page-section">
                <div class="container">
                    <div class="product-item">
                        <div class="product-item-title d-flex">
                            <div class="bg-faded p-5 d-flex ms-auto rounded">
                                <h2 class="section-heading mb-0">
                                    <span class="section-heading-upper text-center"><?= $role->getId(); ?></span>
                                    <span class="section-heading-lower"><?= $role->getName(); ?></span>
                                </h2>
                            </div>
                        </div>
                        <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="/img/manag.jpg" alt="..." />
                        <div class="product-item-description d-flex me-auto">
                            <div class="bg-faded p-5 rounded">
                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In eget aliquam lacus. Aliquam vel lacus lorem. Etiam id pretium nisl. Cras tempus turpis quis sem efficitur consectetur.</p>
                                <button type="button" id="<?php echo($role->getId()); ?>" title="<?php echo($role->getId());echo(",");echo($role->getName());echo(",");echo($role->getPermissions());?>" class="btn btn-outline-secondary" data-toggle="modal" data-target="#edit" onclick="matchInfo(this);">
                                    MODIFY
                                </button>
                                <button type="button" id="<?php echo($role->getId()); ?>" class="btn btn-outline-danger" data-toggle="modal" data-target="#delete" onclick="matchId(this);">
                                    DELETE
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php
        }


        if ($count%2 == 1) { ?>
        
            <section class="page-section">
                <div class="container">
                    <div class="product-item">
                        <div class="product-item-title d-flex">
                            <div class="bg-faded p-5 d-flex me-auto rounded">
                                <h2 class="section-heading mb-0">
                                    <span class="section-heading-upper text-center"><?= $role->getId(); ?></span>
                                    <span class="section-heading-lower"><?= $role->getName(); ?></span>
                                </h2>
                            </div>
                        </div>
                        <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="/img/manag.jpg" alt="..." />
                        <div class="product-item-description d-flex ms-auto">
                            <div class="bg-faded p-5 rounded">
                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In eget aliquam lacus. Aliquam vel lacus lorem. Etiam id pretium nisl. Cras tempus turpis quis sem efficitur consectetur.</p>
                                <button type="button" id="<?php echo($role->getId()); ?>" title="<?php echo($role->getId());echo(",");echo($role->getName());echo(",");echo($role->getPermissions());?>" class="btn btn-outline-secondary" data-toggle="modal" data-target="#edit" onclick="matchInfo(this);">
                                    MODIFY
                                </button>
                                <button type="button" id="<?php echo($role->getId()); ?>" class="btn btn-outline-danger" data-toggle="modal" data-target="#delete" onclick="matchId(this);">
                                    DELETE
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php
        }

        $count = $count + 1;

        } ?>

        
        <footer class="footer text-faded text-center py-5">
            <div class="container"><p class="m-0 small">Haythem & Quentin properties | All rights reserved &copy;</p></div>
        </footer>

        <!-- Scroll top -->
        <a href="#" class="scrollup" id="scroll-up">
            <i class="uil uil-arrow-up scrollup__icon"></i>
        </a>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <!-- Core theme JS-->
        <script src="/js/scriptBarrack.js"></script>

        <script>

            //Function to save the value of the checkboxes when creating a role.
            function check(me) {
                if(me.checked) {
                    me.previousSibling.previousSibling.value = "Y";
                } else {
                    me.previousSibling.previousSibling.value = "N";
                }
            }


            //Function which retrieves information about the role modified by the user.
            function matchInfo(mdfButton) {

                var roleInfo = mdfButton.title.split(",");

                // Converting int number for permissions in binary string whose length is 16.
                var intPermissions = roleInfo[2];
                var binaryString = (intPermissions >>> 0).toString(2);
                var finalBinary = "";

                if(binaryString.length != 16) {

                    var stringZero = "";
                    for(i=0; i <16-binaryString.length; i++) {

                        stringZero = stringZero.concat("0");

                    }

                    finalBinary = stringZero + binaryString;

                    var splittedFinalBinary = finalBinary.split("");
                    var reversedFinalBinary = splittedFinalBinary.reverse();
                    var reversedStringBinary = reversedFinalBinary.join("");

                    roleInfo[2] = reversedStringBinary;

                } else {

                    var splittedFinalBinary = binaryString.split("");
                    var reversedFinalBinary = splittedFinalBinary.reverse();
                    var reversedStringBinary = reversedFinalBinary.join("");

                    roleInfo[2] = reversedStringBinary;

                }
                

                console.log(roleInfo);

                document.getElementById("idModified").value = roleInfo[0];
                document.getElementById("roleModified").value = roleInfo[1];

                // Filling checkboxes concerning firemen permissions section.
                for(i=0; i<4; i++) {

                    if(roleInfo[2][i] == "1") {

                        document.getElementById("boxModifiedF"+(i+1)).checked = true;
                        document.getElementById("boxModifiedInputF"+(i+1)).value = "Y";

                    } else {

                        document.getElementById("boxModifiedF"+(i+1)).checked = false;
                        document.getElementById("boxModifiedInputF"+(i+1)).value = "N";

                    }

                }


                // Filling checkboxes concerning barracks permissions section.
                for(i=0; i<4; i++) {

                    if((roleInfo[2][i + 4]) == "1") {

                        document.getElementById("boxModifiedB"+(i+1)).checked = true;
                        document.getElementById("boxModifiedInputB"+(i+1)).value = "Y";

                    } else {

                        document.getElementById("boxModifiedB"+(i+1)).checked = false;
                        document.getElementById("boxModifiedInputB"+(i+1)).value = "N";

                    }

                }


                // Filling checkboxes concerning users permissions section.
                for(i=0; i<4; i++) {

                    if((roleInfo[2][i + 8]) == "1") {

                        document.getElementById("boxModifiedU"+(i+1)).checked = true;
                        document.getElementById("boxModifiedInputU"+(i+1)).value = "Y";

                    } else {

                        document.getElementById("boxModifiedU"+(i+1)).checked = false;
                        document.getElementById("boxModifiedInputU"+(i+1)).value = "N";

                    }

                }


                // Filling checkboxes concerning roles permissions section.
                for(i=0; i<4; i++) {

                    if((roleInfo[2][i + 12]) == "1") {

                        document.getElementById("boxModifiedR"+(i+1)).checked = true;
                        document.getElementById("boxModifiedInputR"+(i+1)).value = "Y";

                    } else {

                        document.getElementById("boxModifiedR"+(i+1)).checked = false;
                        document.getElementById("boxModifiedInputR"+(i+1)).value = "N";

                    }

                }

            }

            function matchId(buttonDelete) {

                document.getElementById("roleDelete").value = buttonDelete.id;
            }

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