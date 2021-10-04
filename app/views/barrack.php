<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/html/css/barrackStyle.css">
    <!-- <link rel="stylesheet" href="/html/css/barrackJS.js"> -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">    
    <title>Barrack List</title>
</head>

<body>
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
            </tr>
        </thead>
        <tbody>
            <!-- <?php var_dump($listBarrack); ?> -->
            <?php foreach($listBarrack as $listBar) : ?>
                
                <tr>
                    <!-- <th scope="row"></th> -->
                    <td><?php echo ($listBar)->getNumCaserne(); ?></td>
                    <td><?= $listBar->getAdresse(); ?></td>
                    <td><?= $listBar->getCP(); ?></td>
                    <td><?= $listBar->getVille(); ?></td>
                    <td><?= $listBar->getCodeTypeC(); ?></td>
                    <td><button type="button" class="btn btn-outline-secondary">MODIFY</button></td>
                    <td><button type="button" class="btn btn-outline-danger">DELETE</button></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="d-grid gap-2 col-3 mx-auto">
        <button type="button" class="btn btn-primary ">ADD NEW BARRACK</button>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

</body>

</html>