<?php
     include 'connection.php';
     $edit = $_GET['edit'];
     $sql ="select * from student where id = '$edit'";

     $run = mysqli_query($connection,$sql);

     while($row=mysqli_fetch_array($run))
     {
        $uid = $row['Id'];
        $name = $row['Name'];
        $address = $row['Address'];
        $Department = $row['Department'];
        $Gender = $row['Gender'];
        $Skills = $row['Skill'];
        $mobile = $row['Mobil'];   
     }
?>
<?php
    
    include 'connection.php';
    if(isset($_POST['submit']))
    {
        $edit = $_GET['edit'];
        $name =$_POST['Name'];
        $address =$_POST['address'];
        $Department =$_POST['Department'];
        $Gender =$_POST['Gender'];
        $Skills =$_POST['Skill'];
        $mobile =$_POST['Mobil'];

        $sql = "update student set Name = '$name', Address = '$address',Department = '$Department',Gender = '$Gender',Skill = '$Skills',Mobil = '$mobile' where id = '$edit'";

        if(mysqli_query($connection,$sql))
        {
            echo '<script> location.replace("index.php")</script>';
        }
        else
        {            
            echo"Some thing Error" . $connection->error;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Grid Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                <div class="card-header">
                    <h1>Edit the Details</h1>
                </div>
                <div class="card-ody">
                <form action = "add.php" method="post">
                    <div class="form-group">
                        <label >Name</label>
                        <input type="text" name ="name" class="form-control"  placeholder="Enter Name" value="<?php echo $name ?>">                        
                    </div>
                    <div class="form-group">
                        <label >Address</label>
                        <input type="text" name ="address" class="form-control"  placeholder="Enter Address" value="<?php echo $address ?>">                        
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
                            <input type="checkbox" id="java" name="skill" value="Java">
                            <label for="java">Java</label><br>

                            <input type="checkbox" id="python" name="skill" value="Python">
                            <label for="python">Python</label><br>

                            <input type="checkbox" id="c" name="skill" value="C">
                            <label for="c">C</label><br>

                            <input type="checkbox" id="cpp" name="skill" value="C++">
                            <label for="cpp">C++</label><br>

                            <input type="checkbox" id="php" name="skill" value="PHP">
                            <label for="php">PHP</label><br>

                            <input type="checkbox" id="csharp" name="skill" value="C#">
                            <label for="csharp">C#</label><br>
                    </div>
                    <div class="form-group">
                        <label >Mobile</label>
                        <input type="text" name ="Mobile" class="form-control"  placeholder="Enter Mobile Number" value="<?php echo $mobile ?>">                        
                    </div>
                    <br/>
                    <input type="submit" class="btn btn-primary" name="submit" value="Edit">
                </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>