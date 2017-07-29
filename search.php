<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
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
echo "hello";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$a=$_GET["username"];

$sql = "SELECT * FROM userinfo where username = '".($a)."'";

$result = $conn->query($sql);

echo "<table>
<tr>
<th>Seach Result</th>
</tr>";

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
	   	echo "<tr>";
    echo "<td>" . $row['username'] . "</td>";
    echo "</tr>"; 
	}
	echo "</table>";
} else {
    echo "no such user exist";
}


$conn->close();

?>

</body>
</html>

	