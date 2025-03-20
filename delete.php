<?php
     include 'connection.php';
     $delete = $_GET['del'];
    
     $sql = "delete from student where Id='$delete'";
    if(mysqli_query($connection,$sql))
    {
        echo '<script> location.replace("index.php")</script>';
    }
    else
    {            
        echo"Some thing Error" . $connection->error;
    }
    
?>