<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/html/css/listFiremenStyle.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

        <title>Firemen list</title>
    </head>


    <body>

        <!-- Main title of the page -->
        <div class="container text-center mt-3 color1 rounded">
            <h1>LIST CONTAINING ALL THE FIREMEN</h1>
        </div>


        
        <?php
        if ($_POST) {

            //First case when someone tries to delete a fireman.
            if (isset($_POST['deleteFireman'])) {

                try {
                    
                    $matriculeForDelete = $_POST['deleteFireman'];

                    $connexion = app\utils\SingletonDBMaria::getInstance()->getConnection();
                    $daop = new app\models\DAOFireman($connexion);

                    $success = $daop->removeFireman($matriculeForDelete);

                    if ($success == 1) {?>

                        <div class="container mt-5">
                            <div class="alert alert-success text-center fadeAnimation" role="alert">
                                The fireman has been correctly deleted from the database.
                            </div>
                        </div>
                        
                    <?php 
                    }
                } catch (Exception $erreur) { ?>

                    <div class="container mt-5">
                        <div class="alert alert-danger text-center fadeAnimation" role="alert">
                            Oupsi...It seems like there was an error. You should try again if you want to delete this fireman.
                        </div>
                    </div>
                    
                <?php
                }
            }


            //Second case when someone tries to add a new fireman.
            if (isset($_POST['matricule'])) {

                try {

                    $firemanToInsert = new app\models\Fireman($_POST['matricule'],$_POST['firstName'],$_POST['lastName'],$_POST['chefAgret'],$_POST['birthDate'],$_POST['numberBarrack'],$_POST['codeGrade'],$_POST['matriculeResponsable']);
                    
                    $connexion = app\utils\SingletonDBMaria::getInstance()->getConnection();
                    $daop = new app\models\DAOFireman($connexion);

                    $success = $daop->createFireman($firemanToInsert);

                    if ($success == 1) {?>

                        <div class="container mt-5">
                            <div class="alert alert-success text-center fadeAnimation" role="alert">
                                The fireman has been correctly inserted into the database.
                            </div>
                        </div>
                    <?php 
                    }
                } catch (Exception $erreur) {?>

                    <div class="container mt-5">
                        <div class="alert alert-danger text-center fadeAnimation" role="alert">
                            Oupsi...It seems like there was an error. You should try again to add this fireman.
                        </div>
                    </div>
                <?php
                }
            }



            //Third case when someone tries to modify fireman's information.
            if (isset($_POST['modifiedMatricule'])) {

                try {

                    $firemanToUpdate = new app\models\Fireman($_POST['modifiedMatricule'],$_POST['modifiedFirstName'],$_POST['modifiedLastName'],$_POST['modifiedChefAgret'],$_POST['modifiedBirthDate'],$_POST['modifiedNumberBarrack'],$_POST['modifiedCodeGrade'],$_POST['modifiedMatriculeResponsable']);
                    
                    $connexion = app\utils\SingletonDBMaria::getInstance()->getConnection();
                    $daop = new app\models\DAOFireman($connexion);

                    $success = $daop->updateFireman($firemanToUpdate);

                    if ($success == 1) {?>

                        <div class="container mt-5">
                            <div class="alert alert-success text-center fadeAnimation" role="alert">
                                The fireman has been correctly modified into the database.
                            </div>
                        </div>
                    <?php
                    }

                } catch (Exception $erreur) { ?>

                    <div class="container mt-5">
                        <div class="alert alert-danger text-center fadeAnimation" role="alert">
                            Oupsi...It seems like there was an error. You should try again to modify this fireman.
                        </div>
                    </div>
                <?php 
                }

            }

        } ?>



        <div class="d-flex align-items-center justify-content-center mt-4">
            <table class="table table-hover" id="firemenTable">
                <thead >
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Matricule</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Chef Agret</th>
                        <th scope="col">Date de naissance</th>
                        <th scope="col">Numero de caserne</th>
                        <th scope="col">Code de grade</th>
                        <th scope="col">Matricule du responsable</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    for($i=0; $i < count($firemen);$i++) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo($i+1);?></th>
                            <td><?php echo($firemen[$i]->getMatricule());?></td>
                            <td><?php echo($firemen[$i]->getPrenom());?></td>
                            <td><?php echo($firemen[$i]->getNom());?></td>
                            <td><?php echo($firemen[$i]->getChefAgret());?></td>
                            <td><?php echo($firemen[$i]->getDateNaissance());?></td>
                            <td><?php echo($firemen[$i]->getNumCaserne());?></td>
                            <td><?php echo($firemen[$i]->getCodeGrade());?></td>
                            <td><?php echo($firemen[$i]->getMatriculeResponsable());?></td>
                            <td><button class="btn btn-outline-primary" data-toggle="modal" data-target="#modalModifyFireman"id="<?php echo($i+1); ?>" onclick="fillInformation(this)">MODIFY</button></td>
                            <td><button class="btn btn-outline-danger" data-toggle="modal" data-target="#modalDeleteFireman" id="<?php echo($firemen[$i]->getMatricule()); ?>" onclick="deleteFireman(this)">DELETE</button></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>



        <div class="d-flex align-items-center justify-content-center">
            <button data-toggle="modal" data-target="#modalAddFireman" class="btn btn-outline-success">ADD NEW FIREMAN</button>
            <!-- <button class="btn btn-outline-primary" onclick="refresh()">REFRESH DATA TABLE</button> -->
        </div>



        <!-- Modal for deleting a fireman -->
        <div class="modal fade" id="modalDeleteFireman" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Action : Delete a fireman.</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this fireman ?
                        <form action="scratchbis.php" method="post">
                        <input type="hidden" name="deleteFireman" id="deleteFireman"></input>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <!-- Modal for modifying a fireman -->
        <div class="modal fade" id="modalModifyFireman" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Action : Modyfing an existing fireman.</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-center">Change information about this fireman.</p><br>
                        <form action="scratchbis.php" method="post">
                            <div class="form-group">
                                <label for="matricule">Matricule *</label>
                                <input readonly="readonly" type="text" class="form-control w-25" id="modifiedMatricule" name="modifiedMatricule" placeholder="Matricule">
                            </div><br>
                            <div class="row">
                                <div class="col">
                                    <label for="firstName">First name *</label>
                                    <input type="text" class="form-control" placeholder="Prenom" id="modifiedFirstName" name="modifiedFirstName">
                                </div>
                                <div class="col">
                                    <label for="lastName">Last name *</label>
                                    <input type="text" class="form-control" placeholder="Nom" id="modifiedLastName" name="modifiedLastName">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col">
                                    <label for="chefAgret">Chef Agret *</label>
                                    <input type="text" class="form-control" placeholder="Chef Agret" id="modifiedChefAgret" name="modifiedChefAgret">
                                </div>
                                <div class="col">
                                    <label for="birthDate">Date de naissance *</label>
                                    <input type="date" class="form-control" placeholder="Date de Naissance" id="modifiedBirthDate" name="modifiedBirthDate">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col">
                                    <label for="numberBarrack">Numero de caserne *</label>
                                    <input type="number" class="form-control" id="modifiedNumberBarrack" name="modifiedNumberBarrack">
                                </div>
                                <div class="col">
                                    <label for="codeGrade">Code de grade *</label>
                                    <input type="text" class="form-control" placeholder="Code de grade" id="modifiedCodeGrade" name="modifiedCodeGrade">
                                </div>
                            </div><br>
                            <div class="form-group">
                                <label for="matriculeResponsable">Matricule du responsable *</label>
                                <input type="text" class="form-control w-25" id="modifiedMatriculeResponsable" name="modifiedMatriculeResponsable" placeholder="Matricule du responsable">
                            </div><br>
                            <p>Champs obligatoires : *</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-warning">Modify fireman</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <!-- Modal for adding a new fireman -->
        <div class="modal fade" id="modalAddFireman" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Action : Adding a new fireman.</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-center">Please fill all the information.</p><br>
                        <form action="scratchbis.php" method="post">
                            <div class="form-group">
                                <label for="matricule">Matricule *</label>
                                <input type="text" class="form-control w-25" id="matricule" name="matricule" placeholder="Matricule">
                            </div><br>
                            <div class="row">
                                <div class="col">
                                    <label for="firstName">First name *</label>
                                    <input type="text" class="form-control" placeholder="Prenom" id="firstName" name="firstName">
                                </div>
                                <div class="col">
                                    <label for="lastName">Last name *</label>
                                    <input type="text" class="form-control" placeholder="Nom" id="lastName" name="lastName">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col">
                                    <label for="chefAgret">Chef Agret *</label>
                                    <input type="text" class="form-control" placeholder="Chef Agret" id="chefAgret" name="chefAgret">
                                </div>
                                <div class="col">
                                    <label for="birthDate">Date de naissance *</label>
                                    <input type="date" class="form-control" placeholder="Date de Naissance" id="birthDate" name="birthDate">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col">
                                    <label for="numberBarrack">Numero de caserne *</label>
                                    <input type="number" class="form-control" id="numberBarrack" name="numberBarrack">
                                </div>
                                <div class="col">
                                    <label for="codeGrade">Code de grade *</label>
                                    <input type="text" class="form-control" placeholder="Code de grade" id="codeGrade" name="codeGrade">
                                </div>
                            </div><br>
                            <div class="form-group">
                                <label for="matriculeResponsable">Matricule du responsable *</label>
                                <input type="text" class="form-control w-25" id="matriculeResponsable" name="matriculeResponsable" placeholder="Matricule du responsable">
                            </div><br>
                            <p>Champs obligatoires : *</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Add fireman</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <script>
            $(document).ready(function(){
                $('#firemenTable').DataTable();
            });
        </script>

        <script src="../../html/js/deleteFireman.js"></script>
        <script src="../../html/js/modifyFireman.js"></script>
        
    </body>
</html>