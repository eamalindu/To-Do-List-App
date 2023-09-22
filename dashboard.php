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
        <title>Dashboard | To Do List</title>
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
                    <a href="my-profile.php" class="text-white text-decoration-none"> <button class="btn btn-secondary w-100 mt-3 text-white">My Profile</button></a>
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
                        <button class="btn btn-info text-white btn-add" data-bs-toggle="collapse" data-bs-target="#collapse-newtask" aria-expanded="false"><i class="fa fa-plus"></i></button>&nbsp;&nbsp;Add
                        New Task
                        <div class="collapse mt-4" id="collapse-newtask">
                            <div class="card">
                                <form action="php/add_task.php" method="post">
                                    <div class="card-body p-0">
                                        <div class="mb-3 p-0">
                                            <input class="form-control border-0" id="textTask" name="textTask" placeholder="Task Name" required/>
                                            <input class="form-control border-0 text-small" id="textDes" name="textDes" placeholder="Description" required/>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="container w-25 container-select">
                                                <select class="form-select me-1" id="select-date" name="select-date" required>
                                                    <option selected disabled>📅 Due Date</option>
                                                    <option value="<?php echo $currentDate = date('Y-m-d'); ?>">Today</option>
                                                    <option value="<?php $currentDate = date('Y-m-d');
                                                    $currentDate = strtotime($currentDate);
                                                    $currentDate = strtotime("+7 day", $currentDate);
                                                    echo date('Y-m-d', $currentDate); ?>">7 days
                                                    </option>
                                                    <option value="<?php $date = date('Y-m-d', strtotime('+1 month', strtotime(date('Y-m-d'))));
                                                    echo $date; ?>">1 Month
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="container w-25 container-select">
                                                <select class="form-select me-1" id="select-priority" name="select-priority" required>
                                                    <option selected disabled>🚩 Priority</option>
                                                    <option value="Top Priority">Top Priority</option>
                                                    <option value="Medium Priority">Medium Priority</option>
                                                    <option value="Low Priority">Low Priority</option>
                                                </select>
                                            </div>
                                            <div class="container w-25 container-select">
                                                <select class="form-select me-1" id="select-category" name="select-category" required>
                                                    <option selected disabled>🔵 Category</option>
                                                    <option value="Work">Work</option>
                                                    <option value="Education">Education</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                            <div class="container w-25 container-select">
                                                <select class="form-select me-1" id="select-location" name="select-location">
                                                    <option selected disabled>📌 Location</option>
                                                    <option value="N/A">Not Available</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-white d-flex justify-content-end gap-2">
                                        <button class="btn btn-outline-danger btn-sm" type="reset">Cancel</button>
                                        <button class="btn btn-outline-success btn-sm" id="btnAddTask" name="btnAddTask" type="submit">Add</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                include_once('php/dbConnection.php');
                $email = $_SESSION["email"];
                $sql = "SELECT * FROM `task` where `email` = '$email' order by id desc";
                //fire query
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        // to output mysql data in HTML table format
                        echo '<div class="card mt-2">
                                <div class="card-body">
                                    <form action="php/complete_task.php" method="post">
                                        <input value="' . $row["id"] . '" style="display: none" name="id">
                                    <div class="input-group">
                                         <input type="checkbox" class="custom-checkbox" required>&nbsp;
                                            <span class="fw-bold">' . $row["taskName"] . '</span>
                                    </div>
                                        <p class="mb-1">' . $row["description"] . '</p>
                                        <span class="small border rounded-2 p-1 me-2 custom-span">📅 Due By : ' . $row["duedate"] . ' </span>
                                        <span class="small border rounded-2 p-1 me-2 custom-span">🚩 Priority : ' . $row["priority"] . ' </span>
                                        <span class="small border rounded-2 p-1 me-2 custom-span">🔵 Category : ' . $row["category"] . ' </span>
                                        <span class="small border rounded-2 p-1 custom-span">📌 Location : ' . $row["location"] . ' </span>
                                        <button class="btn btn-success btn-sm mt-3 float-end" type="submit" id="btnDone" name="btnDone">✔ Done</button>
                                </div>
                                     </form>
                                </div>';

                    }
                } else {
                    echo '<div class= "card mt-2">
                                <div class="card-body">
                                        <span class="fw-bold">Yay! 🎉</span>
                                        <p class="mb-3">It looks like there are no tasks left to complete.</p>
                                        <span class="small border rounded-2 p-1 me-2 custom-span">📅 Due By : Never </span>
                                        <span class="small border rounded-2 p-1 me-2 custom-span">🚩 Priority :  Not at all </span>
                                        <span class="small border rounded-2 p-1 me-2 custom-span">🔵 Category :  We dont know</span>
                                        <span class="small border rounded-2 p-1 custom-span">📌 Location : We lost it  </span>
                                </div>
                                </div>';
                }
                ?>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
    <script src="js/alert-function.js"></script>
    <?php
    if (isset($_SESSION["task-success"])){
        echo $_SESSION["task-success"];
    }

    unset($_SESSION["task-success"]);
    ?>
    </body>

    </html>

<?php } else {
    $_SESSION['login-failed'] = '<script>showAlert("Please Login To Your Account !","bg-warning")</script>';
    header("location:index.php");
}