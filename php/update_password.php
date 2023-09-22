<?php
session_start();
include_once ("dbConnection.php");
if(isset($_POST["btnUpdatePassword"])){

    $oldPassword = $_POST["textCurrentPassword"];
    $newPassword = $_POST["textConfirmPassword"];
    $email = $_SESSION["email"];

    $oldPassword = stripcslashes($oldPassword);
    $newPassword = stripcslashes($newPassword);
    $email = stripcslashes($email);

    $oldPassword = mysqli_escape_string($conn,$oldPassword);
    $newPassword = mysqli_escape_string($conn,$newPassword);
    $email = mysqli_escape_string($conn,$email);

    $sql_check_old_password = "SELECT `id` from `login` where (`password` = '$oldPassword' and `email` ='$email')";
    $result_profile = mysqli_query($conn, $sql_check_old_password);
    if (mysqli_num_rows($result_profile) > 0) {
        $sql = "Update `login` set `password` = '$newPassword' where email = '$email'";
        if (mysqli_query($conn, $sql)) {
            $_SESSION["task-success"] = '<script>showAlert("Your Password was Updated !","bg-success")</script>';
            header("Location: ../my-profile.php");
        }
    }
    else{
        $_SESSION["task-success"] = '<script>showAlert("Your Current Password is Incorrect !","bg-danger")</script>';
        header("Location: ../my-profile.php");
    }




}