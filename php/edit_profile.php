<?php
session_start();
include_once ("dbConnection.php");
if(isset($_POST["btnUpdateProfile"])){

    $email = $_SESSION["email"];
    $updatedFullName = $_POST["textFullName"];

    $email = stripcslashes($email);
    $updatedFullName = stripcslashes($updatedFullName);

    $email = mysqli_escape_string($conn,$email);
    $updatedFullName = mysqli_escape_string($conn,$updatedFullName);

    $sql = "Update `user` set `name` = '$updatedFullName' where email = '$email' ";

    if (mysqli_query($conn, $sql)) {
        $_SESSION["task-success"] = '<script>showAlert("Bio Updated Successfully !","bg-success")</script>';
        header("Location: ../my-profile.php");
    }


}

