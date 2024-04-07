<?php




$first_name = $_POST["firstname"];
$middle_name = $_POST["middlename"];
$last_name = $_POST["lastname"];
$gender = $_POST["gender"];
$contact = $_POST["contact"];
$password = $_POST["password"];



//GETTING DATA IN

$conn = new mysqli(hostname:"Localhost",
                   username:"root",
                   database:"web_app_database",
                   password:"");

if($conn -> connect_error){
    echo"CONNECTION ERROR seen...";
    die("connect Failed". $conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into form_table(firstname,middlename,lastname,gender,contact,password) values 
                            (?,?,?,?,?,?)");
    $stmt->bind_param("ssssis",$first_name,$middle_name,$last_name,$gender,$contact,$password);
    $stmt->execute(); 
    echo "<h1 style='color:red; text-align:center;'>Data submitted Successfully...</h1>";
    echo "<a style='position:relative; left:50%;' href='index.html'><input style='background-color:black; color:white;'type='button' value='Start Page'></a>";
    $stmt->close();
    $conn->close();                    
}


//GETTING DATA OUT


?>