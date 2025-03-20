<?php
include 'connection.php';

if(isset($_POST['submit'])) {
    // Sanitize input data
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);
    $department = mysqli_real_escape_string($connection, $_POST['Department']);
    $gender = mysqli_real_escape_string($connection, $_POST['gender']);
    $mobile = mysqli_real_escape_string($connection, $_POST['Mobil']);

    // Ensure skills are captured correctly
    $Skills = isset($_POST['Skill']) ? $_POST['Skill'] : []; // Ensure it's an array

    // Convert array to comma-separated string
    $SkillsString = !empty($Skills) ? implode(", ", $Skills) : '';

    // Insert into database
    $sql = "INSERT INTO student (Name, Address, Department, Gender, Skill, Mobil) 
            VALUES ('$name', '$address', '$department', '$gender', '$SkillsString', '$mobile')";

    if(mysqli_query($connection, $sql)) {
        echo '<script> location.replace("index.php")</script>';
    } else {
        echo "Something went wrong: " . mysqli_error($connection);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Crud Application</title>
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
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h1>Student Crud Application</h1>
                    </div>
                    <div class="card-body">
                        <div class="form">
                            <form action="add.php" method="post">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Name">                        
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" name="address" class="form-control" placeholder="Enter Address">                        
                                </div>
                                <div class="form-group">
                                    <label for="dept">Department</label><br/>
                                    <input list="Dept-options" id="dept" name="Department">
                                    <datalist id="Dept-options">
                                        <option value="Computer Science">
                                        <option value="Information Technology">
                                        <option value="Civil">
                                        <option value="EEE">
                                        <option value="ECE">
                                        <option value="Mechanical">
                                    </datalist>                        
                                </div>
                                <div>
                                    <label>Choose your gender:</label><br>                        
                                    <input type="radio" id="male" name="gender" value="Male">
                                    <label for="male">Male</label>
                                    <input type="radio" id="female" name="gender" value="Female">
                                    <label for="female">Female</label>
                                </div>
                                <div>
                                    <label>Select your skills:</label><br>
                                    <input type="checkbox" name="Skill[]" value="Java"> Java <br>
                                    <input type="checkbox" name="Skill[]" value="Python"> Python <br>
                                    <input type="checkbox" name="Skill[]" value="C"> C <br>
                                    <input type="checkbox" name="Skill[]" value="C++"> C++ <br>
                                    <input type="checkbox" name="Skill[]" value="PHP"> PHP <br>
                                    <input type="checkbox" name="Skill[]" value="C#"> C# <br>
                                    <br>                       
                                </div>
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input type="text" name="Mobil" class="form-control" placeholder="Enter Mobile Number">                        
                                </div>
                                <br/>
                                <input type="submit" class="btn btn-primary" name="submit" value="Register">
                            </form>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
