<?php

    session_start();
    require 'connection.php';

    if(isset($_POST['delete'])){
        $id = mysqli_real_escape_string($conn, $_POST['delete']);
        $query = "DELETE FROM `student_table` WHERE `Id`='$id'";
        $query_run = mysqli_query($conn, $query);

        if($query_run){
            $_SESSION['message'] = "Deleted successfully";
            header("Location: index.php");
            exit(0);
        }
        else{
            $_SESSION['message'] = "Deletion Failed";
            header("Location: index.php");
            exit(0);
        }
    }

    if(isset($_POST['update'])){
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $rollno = mysqli_real_escape_string($conn, $_POST['rollno']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $dept = mysqli_real_escape_string($conn, $_POST['dept']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);

        $query = "UPDATE `student_table` SET `Name`='$name',`Roll_No`='$rollno',`Email_Id`='$email',`Department`='$dept',`Phone_Number`='$phone' WHERE Id='$id' ";
        $query_run = mysqli_query($conn, $query);

        if($query_run){
            $_SESSION['message'] = "Updated successfully";
            header("Location: index.php");
            exit(0);
        }
        else{
            $_SESSION['message'] = "Updation Failed";
            header("Location: index.php");
            exit(0);
        }


    }


    if(isset($_POST['save'])){

        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $rollno = mysqli_real_escape_string($conn, $_POST['rollno']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $dept = mysqli_real_escape_string($conn, $_POST['dept']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);


        $query = "INSERT INTO `student_table`(`Name`, `Roll_No`, `Email_Id`, `Department`, `Phone_Number`) VALUES ('$name','$rollno','$email','$dept','$phone')";

        $query_run = mysqli_query($conn, $query);

        if($query_run){
            $_SESSION['message'] = "Created successfully";
            header("Location: create.php");
            exit(0);
        }

        else{
            $_SESSION['message'] = "Failed to create";
            header("Location: create.php");
            exit(0);
        }
    }

?>