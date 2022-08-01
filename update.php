<?php
    session_start();
    require 'connection.php'
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>

    <div class="container mt-5">

    <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Update data
                        <a href="index.php" class="btn btn-danger float-end">Back</a>

                        </h4>
                    </div>

                    <div class="card-body">

                        <?php

                            if(isset($_GET['id'])){
                                $student_id = mysqli_real_escape_string($conn, $_GET['id']);
                                $query = "SELECT * FROM `student_table` WHERE `Id`='$student_id'";
                                $query_run = mysqli_query($conn, $query);

                                if(mysqli_num_rows($query_run)> 0){
                                    $student = mysqli_fetch_array($query_run);
                                    ?>

                                    <form action="action.php" method="post">
                                        
                                        <input type="hidden" name="id" value="<?= $student_id ?>">

                                        <div class="mb-3">
                                            <label for="">Name</label>
                                            <input type="text" name="name" value="<?= $student['Name'] ?>" class="form-control" required>
                                        </div>


                                        <div class="mb-3">
                                            <label for="">Roll No</label>
                                            <input type="text" name="rollno" value="<?= $student['Roll_No'] ?>" class="form-control" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="">Email</label>
                                            <input type="email" name="email" value="<?= $student['Email_Id'] ?>" class="form-control" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="">Department</label>
                                            <input type="text" name="dept" value="<?= $student['Department'] ?>" class="form-control" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="">Phone Number</label>
                                            <input type="number" name="phone" value="<?= $student['Phone_Number'] ?>" class="form-control" required>
                                        </div>

                                        <div class="mb-3">
                                            <button type="submit" name="update" class="btn btn-primary">Update</button>
                                        </div>
                           
                        </form>

                        <?php
                                }
                            }
                            else{
                                echo "Not Found!";
                            }

                        ?>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>
