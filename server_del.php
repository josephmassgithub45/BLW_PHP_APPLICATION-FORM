<?php
$employeeid = $_POST["employeeid"];
$tablename = $_POST["tablename"];

$conn = new mysqli(hostname:"Localhost",
                       username:"root",
                       database:"web_app_database",
                       password:"");
                    
if($conn -> connect_error){
    echo"CONNECTION ERROR seen...";
    die("connect Failed". $conn->connect_error);
}

$stmt = $conn->prepare("delete $tablename 
                        where employeeid=$employeeid");  

if($conn->query($stmt) === TRUE){
    echo "<h1 style='text-align:center; color:red;'>Data has been deleted successfully...</h1>";
    echo "<a style='position:relative; left:50%;' href='index.html'><input style='background-color:black; color:white;'type='button' value='Start Page'></a>";
}else{

    echo "<h1 style='text-align:center; color:red;'>Error Deleting Record...</h1>";
    echo "<a style='position:relative; left:50%;' href='index.html'><input style='background-color:black; color:white;'type='button' value='Start Page'></a>";
}
$conn->close();
?>