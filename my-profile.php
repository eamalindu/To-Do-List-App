<?php
session_start();
?>
<?php
if (isset($_SESSION["email"])) {
    ?>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My Profile | To Do List</title>
        <!--bootstrap CSS CDN-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <!--custom css-->
        <link rel="stylesheet" href="css/style.css">
        <!--boostrap JS CDN-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>
        <!--calender JS-->
        <link rel="stylesheet" type="text/css" href="jsCalendar/source/jsCalendar.min.css">
        <link rel="stylesheet" type="text/css" href="jsCalendar/themes/jsCalendar.darkseries.min.css">
        <script type="text/javascript" src="jsCalendar/source/jsCalendar.js"></script>
        <!--fontawesome CDN-->
        <script src="https://kit.fontawesome.com/07941f149f.js" crossorigin="anonymous"></script>
        <!-- jquery CDN-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    </head>

    <body class="d-block">
    <nav class="navbar bg-body-tertiary bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="dashboard.php">Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                    aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="filter:invert(100%)"></span>
            </button>
            <div class="offcanvas offcanvas-start bg-dark text-white" tabindex="-1" id="offcanvasNavbar"
                 aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Welcome
                        👋<br/><?php echo($_SESSION['email']); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"
                            style="filter:invert(100%)"></button>
                </div>
                <div class="offcanvas-body">
                    <h5>Today is :
                        <mark class="bg-warning rounded-1"><?php $currentDate = date('Y-m-d');
                            echo $currentDate; ?></mark>
                    </h5>
                    <br/>
                    <div class="card bg-dark text-center border-0">
                        <div class="card-body d-flex justify-content-center p-0">
                            <div class="auto-jsCalendar black-theme"></div>
                        </div>
                    </div>
                    <button class="btn btn-primary w-100 mt-4"><i class="fa fa-plus"></i> Add Task</button>
                    <a href="my-profile.php" class="text-white text-decoration-none">
                        <button class="btn btn-secondary w-100 mt-3 text-white">My Profile</button>
                    </a>
                    <a href="php/logout.php" class="text-white text-decoration-none">
                        <button
                                class="btn btn-danger w-100 mt-3 text-white">Logout
                        </button>
                    </a>
                </div>

            </div>
        </div>
    </nav>

    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-lg-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-info text-white btn-add" data-bs-toggle="collapse" data-bs-target="#collapse-myprofile" aria-expanded="false"><i class="fa-regular fa-pen-to-square"></i>
                        </button>&nbsp;&nbsp;My Profile
                        <div class="collapse mt-4 show" id="collapse-myprofile">
                            <div class="card">
                                <div class="card-body">
                                    <center><img src="images/avatar.png" width="25%" alt="avatar"/></center>
                                    <h4 class="fw-bold">Bio</h4>
                                    <?php
                                    include_once("php/dbConnection.php");
                                    $email = $_SESSION["email"];
                                    $sql = "Select `name` from `user` where email = '$email'";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_row($result);
                                    $_SESSION["fullName"] = $row[0];
                                    ?>
                                    <form action="php/edit_profile.php" method="post">
                                        <div class="mb-3">
                                            <label for="textFullName" class="form-label">Full Name :</label>
                                            <input class="form-control" id="textFullName" name="textFullName" placeholder="Your Full Name" value="<?php echo $_SESSION["fullName"] ?>" required/>
                                        </div>
                                        <div class="mb-3">
                                            <label for="textEmailUser" class="form-label">Email :</label>
                                            <input class="form-control" id="textEmailUser" name="textEmailUser" placeholder="example@domain.com" value="<?php echo $_SESSION['email'] ?>" required
                                                   readonly/>
                                        </div>
                                        <div class="mb-3 d-flex justify-content-end gap-2">
                                            <button class="btn btn-success" id="btnUpdateProfile" name="btnUpdateProfile" type="submit">Update Profile</button>
                                        </div>
                                    </form>
                                    <h4 class="fw-bold">Change Password</h4>
                                    <form action="php/update_password.php" method="post">
                                        <div class="mb-3">
                                            <label class="form-label" for="textCurrentPassword">Current Password :</label>
                                            <input class="form-control" id="textCurrentPassword" name="textCurrentPassword" placeholder="*********" type="password" required/>
                                            <label class="form-label" for="textNewPassword">New Password :</label>
                                            <input class="form-control" id="textNewPassword" name="textNewPassword" placeholder="*********" type="password" required/>
                                            <label class="form-label" for="textConfirmPassword">Confirm Password :</label>
                                            <input class="form-control" id="textConfirmPassword" name="textConfirmPassword" placeholder="*********" type="password" required/>
                                        </div>
                                        <div class="mb-3 d-flex justify-content-end gap-2">
                                            <button class="btn btn-success" id="btnUpdatePassword" name="btnUpdatePassword" type="submit">Update Password</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
    <script src="js/alert-function.js"></script>
    <script src="js/my-profile.js"></script>
    </body>
    <?php
    if (isset($_SESSION["task-success"])) {
        echo $_SESSION["task-success"];
    }

    unset($_SESSION["task-success"]);
    ?>
    </html>
    <?php
} else {
    $_SESSION['login-failed'] = '<script>showAlert("Please Login To Your Account !","bg-warning")</script>';
    header("location:index.php");
}
unset($_SESSION["fullName"]);
?>