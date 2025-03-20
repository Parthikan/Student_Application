<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Grid Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>        
        .form {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h1>Student CRUD Application</h1>
                        </div>
                        <div class="card-body"> 
                            <a href="add.php" class="btn btn-success text-light">Add New</a>
                            <br/><br/>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Roll_No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Department</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Skill</th>
                                        <th scope="col">Mobile</th>
                                        <th scope="col">Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include 'connection.php';
                                    $sql = "SELECT * FROM student";
                                    $run = mysqli_query($connection, $sql);    

                                    $id = 01; 

                                    while ($row = mysqli_fetch_array($run)) {
                                        $uid = $row['Id'];
                                        $name = $row['Name'];
                                        $address = $row['Address'];
                                        $Department = $row['Department'];
                                        $Gender = $row['Gender'];
                                        $Skills =  $row['Skill'];
                                        $mobile = $row['Mobil'];
                                    ?>

                                    <tr>
                                        <td><?php echo $id ?></td>
                                        <td><?php echo $name ?></td>
                                        <td><?php echo $address ?></td>
                                        <td><?php echo $Department ?></td>
                                        <td><?php echo $Gender ?></td>
                                        <td><?php echo $Skills ?></td>
                                        <td><?php echo $mobile ?></td>

                                        <td>
                                            <a href="edit.php?edit=<?php echo $uid; ?>" class="btn btn-success text-light">Edit</a>
                                            <a href="delete.php?del=<?php echo $uid; ?>" class="btn btn-danger text-light">Delete</a>
                                        </td>
                                    </tr>

                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
