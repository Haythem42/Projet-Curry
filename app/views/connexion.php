<?php 
use app\models\Auth;
?>

<!DOCTYPE html>
    <html lang="en">
    <head>


        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="../css/connexionStyle.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="icon" type="image/x-icon" href="/img/role.ico" />


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <title>Connexion page</title>


    </head>


    <body>

    <?php

        // If a user is already connected we redirect to the landing page.
        if(!empty($_SESSION['auth'])) { header("Location: /home/display"); }

        // First case : when the user has validated his login and password.
        if(!empty($_POST)){


            try {

                $user = Auth::login($_POST['connexionLogin'], $_POST['connexionPassword']);

            }
            catch( \Exception $error){}

            if ($user) {

                header('Location: ../home/display');
                exit();

            }
        }
        ?>


        <div class="container-fluid">
            <div class="row" style="min-height: 100vh;">
                <div class="col-5">
                    <div class="container">
                        <div class="container d-flex justify-content-center" style="margin-top: 40%;">
                            <p class="welcome-title">
                                Welcome on our project !
                            </p>
                        </div>
                    </div>
                    <div class="container">
                        <div class="container d-flex justify-content-center">
                            <p class="welcome-message">
                                Enter your personal details and start your journey with us.
                            </p>
                        </div>
                    </div>

                </div>
                <div class="col-7">
                    <div class="container">
                        <div class="container d-flex justify-content-center" style="margin-top: 15%;">
                            <p class="title">Sign in to Curry project</p>
                        </div>
                        <div class="container d-flex justify-content-center" style="min-height: 80px;">
                        <?php if(isset($_SESSION['erreur'])): ?>
                            <div class="alert alert-danger flash">
                                Login or password incorrect.
                            </div>
                        <?php endif ?>
                        <?php unset($_SESSION['erreur']); ?>
                        <?php if(isset($_SESSION['notConnected'])): ?>
                            <div class="alert alert-danger flash">
                                Nice try... But you need to be logged before accessing the project !
                            </div>
                        <?php endif ?>
                        <?php unset($_SESSION['notConnected']); ?>
                        </div>
                        <div class="container d-flex justify-content-center">
                            <form action="" method="POST">

                                <div class="form-group">
                                    <input type="text" class="form-control" id="connexionLogin"  name="connexionLogin" placeholder="Last name...">
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control" id="connexionPassword" name="connexionPassword" placeholder="Password...">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="passwordBox" onclick="toggleVisibility()">
                                        <label class="form-check-label" for="passwordBox">
                                            Toggle visibility
                                        </label>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary">SIGN IN</button>
                                </div>                                
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
       


    <script>
        function toggleVisibility() {

            var x = document.getElementById("connexionPassword");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }

        }
    </script>


    </body>
</html>


