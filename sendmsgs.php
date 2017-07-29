<?php

$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "chatapplication";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$a=$_GET["msg"];
$b=$_GET["user"];
$c=$_GET["user2"];

$sql="INSERT INTO message (from_user, to_user, msg) VALUES ('".$b."','".$c."', '".$a."')";
//$sql = "select to_user,msg,time from message where to_user= '".$user."' and from_user = 'prexa' or to_user= 'prexa' and from_user = '".$user."' order by time desc;";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();

?>

	