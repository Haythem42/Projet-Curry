<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/html/css/firemanStyle.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

        <title>Firemen list</title>
    </head>


    <body>
        <div class="d-flex align-items-center justify-content-center mt-2">
            <table class="table table-striped" id="firemenTable">
                <thead>
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
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php for($i=0; $i < count($firemen);$i++) {
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
                            <td><button class="btn btn-outline-primary">MODIFY</button></td>
                            <td><button class="btn btn-outline-danger">DELETE</button></td>
                        </tr>
                        <?php
                    }?>
                </tbody>
            </table>
        </div>
        <div class="d-flex align-items-center justify-content-center">
            <button class="btn btn-outline-success">ADD NEW FIREMAN</button>
        </div>

        <script>
            $(document).ready(function() {
                $('#firemenTable').DataTable();
            });
        </script>

    </body>
</html>