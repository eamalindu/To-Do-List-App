<?php
session_start();
include_once ('dbConnection.php');

if(isset($_POST['btnAddTask'])) {
    //get values from the form
    $email = $_SESSION["email"];
    $taskName = $_POST["textTask"];
    $description = $_POST["textDes"];
    $duedate = $_POST["select-date"];
    $priority = $_POST["select-priority"];
    $category = $_POST["select-category"];
    $location = $_POST["select-location"];

    $email = stripcslashes($email);
    $taskName = stripcslashes($taskName);
    $description = stripcslashes($description);
    $duedate = stripcslashes($duedate);
    $priority = stripcslashes($priority);
    $category = stripcslashes($category);
    $location = stripcslashes($location);

    $email = mysqli_real_escape_string($conn,$email);
    $taskName = mysqli_real_escape_string($conn,$taskName);
    $description = mysqli_real_escape_string($conn,$description);
    $duedate = mysqli_real_escape_string($conn,$duedate);
    $priority = mysqli_real_escape_string($conn,$priority);
    $category = mysqli_real_escape_string($conn,$category);
    $location = mysqli_real_escape_string($conn,$location);

    $sql = "insert into task (email, taskName, description, duedate, priority, category, location) values ('$email','$taskName','$description','$duedate','$priority','$category','$location');";
    if (mysqli_query($conn, $sql)) {
        $_SESSION["task-success"] = '<script>showAlert("Task Added Successfully !","bg-success")</script>';
        header("Location: ../dashboard.php");
    }
}