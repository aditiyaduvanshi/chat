<?php
session_start();
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

$a=$_GET["name"];
$b=$_GET["pass"];
$c=$_GET["repass"];
$_SESSION['varname'] = $a;
if($b === $c){
$sql = "SELECT username FROM userinfo where username = '".($a)."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    // while($row = $result->fetch_assoc()) {
    //     echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    // }
    echo "username already exists";
} else {

$sql = "INSERT INTO `userinfo`(`username`, `password`) VALUES ('".($a)."','".($b)."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
header('Location: msg.php');
}

}
else{
	echo "password must be same";
}

$conn->close();
?>


	