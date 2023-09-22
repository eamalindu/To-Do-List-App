<?php
session_start();
include_once ('dbConnection.php');

if(isset($_POST['btnLogin'])){

    $email = $_POST['textUsername'];
    $password = $_POST['textPassword'];

    $email = stripcslashes($email);
    $email = mysqli_real_escape_string($conn,$email);
    $password = stripcslashes($password);
    $password = mysqli_real_escape_string($conn,$password);

    $sql = "select `id` from `login` where `email`= '$email' and `password` = '$password' ";

    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['email'] = $email;
        header("Location:../dashboard.php");
    }
    else{
        $_SESSION['login-failed'] = '<script>showAlert("Username or Password is Incorrect !","bg-danger")</script>';
        header("Location: ../");
    }


    
}
