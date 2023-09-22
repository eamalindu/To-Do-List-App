<?php session_start();?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login | To Do List</title>
    <!--bootstrap CSS CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!--custom css-->
    <link rel="stylesheet" href="css/style.css">
    <!--boostrap JS CDN-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <!-- jquery CDN-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>

<body>
    <div class="container custom-login-container">
        <div class="card bg-dark text-white">
            <div class="card-header bg-dark text-center">
                <a href="index.php"><img src="images/logo.png" width="50%" alt="main-logo"></a>
                <h3>User Login</h3>
            </div>
            <div class="card-body">
                <form action="php/login.php" method="post">
                    <div class="mb-3">
                        <label for="textUsername" class="form-label">Enter Your Email</label>
                        <input type="text" class="form-control" placeholder="example@domain.com" id="textUsername"
                            name="textUsername" required>
                    </div>
                    <div class="mb-3">
                        <label for="textPassword" class="form-label">Enter Your Password</label>
                        <input type="password" class="form-control" placeholder="********" id="textPassword"
                            name="textPassword" required>
                    </div>
                    <div class="mb-3">
                        <input type="checkbox" class="form-check-inline me-1" id="checkPassword">
                        <label for="checkPassword">Show Password</label>
                    </div>
                    <div class="mb-0 d-flex justify-content-end gap-2">
                        <button class="btn btn-primary" id="btnLogin" type="submit" name="btnLogin">Login</button>
                        <button class="btn btn-danger" id="btnReset" type="reset">Reset</button>
                    </div>
                </form>
            </div>
            <div class="card-footer bg-dark text-center">
                <h6><a href="signup.php">New User ?</a> | <a href="forget-password.html">Forgot Password ?</a></h6>
            </div>
        </div>
    </div>
    <script src="js/alert-function.js"></script>
    <script src="js/index.js"></script>

    <?php 
    if(isset($_SESSION['login-failed'])){
        echo $_SESSION['login-failed'];
    }

    unset($_SESSION['login-failed']);
    ?>
</body>

</html>