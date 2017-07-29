<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 0px;
}

table, td, th {
    //border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>


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
$a=$_GET["msg_id"];
$b=$_GET["user"];
$c=$_GET["user2"];

$sql = "select * from message where (to_user= '".$b."' and from_user = '".$c."' or to_user= '".$c."' and from_user = '".$b."') and msg_id > ".$a." order by time ;";

$result = $conn->query($sql);

echo "<table class='table table-striped'>
<tr>
<th>From</th>
<th>To</th>
<th>Message</th>
<th>Time</th>
</tr>";

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
	   	echo "<tr>";
    echo "<td>" . $row['from_user'] . "</td>";
    echo "<td>" . $row['to_user'] . "</td>";
    echo "<td>" . $row['msg'] . "</td>";
    echo "<td>" . $row['time'] . "</td>";
    echo "</tr>"; 
	}
	echo "</table>";
} else {
    echo "[]";
}


$conn->close();

?>

</body>
</html>

	