<?php
session_start();
include_once ("dbConnection.php");
if(isset($_POST["btnSignup"])){

    $fullName = $_POST["textFullName"];
    $email = $_POST["textUsername"];
    $passwordConfirm = $_POST["textPasswordConfirm"];

    $fullName = stripcslashes($fullName);
    $email = stripcslashes($email);
    $passwordConfirm = stripcslashes($passwordConfirm);

    $fullName = mysqli_escape_string($conn,$fullName);
    $email = mysqli_escape_string($conn,$email);
    $passwordConfirm = mysqli_escape_string($conn,$passwordConfirm);

    $sql_user = "insert into `user` (`name`, `email`) values ('$fullName','$email');";
    if (mysqli_query($conn, $sql_user)) {

        $sql_login = "insert into `login` (`email`, `password`, `status`) values ('$email','$passwordConfirm',1);";
        if(mysqli_query($conn,$sql_login)){
            $_SESSION['login-failed'] = '<script>showAlert("Account Created Successfully !","bg-success")</script>';
            header("Location:../");
        }
    }

}