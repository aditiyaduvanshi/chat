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
$_SESSION['varname'] = $a;


$sql = "SELECT * FROM userinfo where username = '".($a)."' && password = '".($b)."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    // while($row = $result->fetch_assoc()) {
    //     echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    // }
    echo "";
    header('Location: msg.php');
} else {
    echo "username not valid";
}

$conn->close();

?>

	