<?php
$employeeid = $_POST["employeeid"];
$first_name = $_POST["firstname"];
$middle_name = $_POST["middlename"];
$last_name = $_POST["lastname"];


$conn = new mysqli(hostname:"Localhost",
                       username:"root",
                       database:"web_app_database",
                       password:"");

if($conn -> connect_error){
    echo"CONNECTION ERROR seen...";
    die("connect Failed". $conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into employee(employeeid,firstname,middlename,lastname) values 
                            (?,?,?,?)");
    $stmt->bind_param("isss",$employeeid,$first_name,$middle_name,$last_name);
    $stmt->execute();
    echo "<h1 style='text-align:center; color:red;'>Data of Entry 2 has been submitted successfully...</h1>";
    echo "<a style='position:relative; left:50%;' href='index.html'><input style='color:white; background-color:black'type='button' value='Start Page'></a>";
    $stmt->close();
    $conn->close();
}

?>