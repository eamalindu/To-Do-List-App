<?php
session_start();
include_once('dbConnection.php');
if(isset($_POST["btnDone"])){
    $id = $_POST["id"];

    $sql = "Delete from `task` where id = '$id'";

    if (mysqli_query($conn, $sql)) {
        $_SESSION["task-success"] = '<script>showAlert("Task Completed Successfully !","bg-primary")</script>';
        header("Location: ../dashboard.php");
    }


}