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

$sql = "select * from message where (to_user= '".$b."' and from_user = '".$c."' or to_user= '".$c."' and from_user = '".$b."') and msg_id > ".$a." order by time desc;";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $rows = array();
  while($r = mysqli_fetch_assoc($result)) {
      $rows[] = $r;
  }
  echo json_encode($rows);
} else {
    echo "[]";
}


$conn->close();

?>

  