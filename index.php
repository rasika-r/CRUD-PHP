<?php
    session_start();
    require 'connection.php'
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>

    <div class="container mt-5">
        <?php
            include('message.php');

        ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student Details
                            <a href="create.php" class="btn btn-primary float-end">Add new data</a>
                        </h4>
                    </div>

                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Roll No</th>
                                    <th>Email</th>
                                    <th>Department</th>
                                    <th>Phone Number</th>
                                    <th>Action</th>

                                </tr>
                            </thead>

                            <tbody>
                                
                                <?php
                                    $query = "SELECT * FROM `student_table`";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0){
                                        foreach($query_run as $student){
                                            ?>
                                            <tr>
                                                <td><?= $student['Id'] ?></td>
                                                <td><?= $student['Name'] ?></td>
                                                <td><?= $student['Roll_No'] ?></td>
                                                <td><?= $student['Email_Id'] ?></td>
                                                <td><?= $student['Department'] ?></td>
                                                <td><?= $student['Phone_Number'] ?></td>
                                                <td>
                                                    <a href="read.php?id=<?=$student['Id']?>" class="btn btn-info btn-sm">View</a>
                                                    <a href="update.php?id=<?=$student['Id']?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="action.php" class="d-inline" method="POST">
                                                    <button type="submit" name="delete" class="btn btn-danger btn-sm" value="<?=$student['Id'] ?>">Delete</button>

                                                    </form>
                                                </td>
                                            </tr>
                                        <?php   
                                        }
                                    }
                                    else{
                                        echo "No Record Found";
                                    }
                                ?>

                                
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>
