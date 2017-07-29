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
$user= $_SESSION['varname'];
echo $user;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style type="text/css">
      .div1{
          margin-top: 5%;
        }

          .scroll {
    background-color: white;
    width: 65%;
    height: 100%;
    overflow: scroll;

      }
  </style>
<script type="text/javascript">
  var contact="";
</script>
</head>
<body style="overflow:hidden">

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-4 col-md-4" style="background-color:light_grey;height:100%;">
      <div class="container" style="align:center;">
  <h2>Select a contact</h2>
  <form class="">
    <div class="form-group">
      <input type="text" class="form-control" id="username" placeholder="username" name="username">
    </div>
    <button class="btn btn-default div2" onclick="searchuser();">Search</button>
  </form>
</div>

<div id="para1"></div>

  <?php

  $sql = "SELECT DISTINCT to_user, from_user from message WHERE to_user='".$user."' or from_user='".$user."' order by time desc";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  ?>
<table class="table table-striped">
    <thead>
      <tr>
        <th><b>Your Contacts</b></th>
      </tr>
    </thead>
    <tbody>
<?php 
    $userarr=array();

    while($row = $result->fetch_assoc()) {
      
      if ($row["from_user"]===$user) {
        $contact=$row["to_user"];
      }
      else{
        $contact=$row["from_user"];
      }
      $arrlength = count($userarr);
       $i=0;
       for( ; $i < $arrlength; $i++) {
         if($userarr[$i]===$contact){
            break;
        }
} 
      if( $i>=$arrlength){
        array_push($userarr,$contact);
        //echo $i; 
        ?>
        <tr>
        <td><a href="#" onclick="contact='<?php echo $contact ?>';myFunction()" ><?php echo $contact ?></td>
    </tr>

  <?php  }}  ?>
  </tbody>
  </table>

  <?php 
}
   else {
    echo "0 results";
}
?>
    </div>

    <div class="col-sm-8 col-md-8 scroll" style="background-color:grey;height:100%;">
    <div id="para" class=""></div>
      <form class="">
    <div class="input-group div1">
      <textarea class="form-control" rows="1" id="comment" placeholder="Search username" name="msg"></textarea>
      <div class="input-group-btn" >
        <button class="btn btn-default" type="button" onclick="sendmessage();getmessage()"><large><i class="glyphicon glyphicon-send"></i></large></button>
      </div>
    </div>
  </form>
    </div>
  </div>
</div>
 <script type="text/javascript">

 function myFunction() {
    setInterval(function(){ getmessage() }, 1000);
}

 

 function sendmessage(){
   var fbURL="sendmsgs.php";
  $.ajax({
      url: fbURL,
      data: {"user":<?php echo "'".$user."'"; ?>,
              "msg":$("#comment").val(),
              "user2":contact},
      type: 'GET',
      success: function (resp) {
          alert(resp);
      },
      error: function(e) {
          alert('Error: '+e);
      }  
  });
 }
 </script> 

 <script type="text/javascript">

 function getmessage(){
   var fbURL="getmsg.php";

  $.ajax({
      url: fbURL,
      data: {"user":<?php echo "'".$user."'"; ?>,
              "msg_id":0,
              "user2":contact},
      type: 'GET',
      success : function(text){
            $('#para').html(text);
        },
      error: function(e) {
          alert('Error: '+e);
      }  
  });
 }

 function searchuser(){
   var fbURL="search.php";

  $.ajax({
      url: fbURL,
      data: {"username":$("#username").val()},
      type: 'GET',
      success : function(text){
            $('#para1').html(text);
        },
      error: function(e) {
          alert('Error: '+e);
      }  
  });
 }
 </script> 


</body>
</html>

<?php
$conn->close();
?>


