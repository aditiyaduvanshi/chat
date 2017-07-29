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
  #d2 {
    display: none;
  }

  h3{
    margin-bottom: 50px;
    text-align: center;
  }

  .div1{
    width: 50%;
  }
  .div2{
    margin-left: 45%;
  }
</style>

</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container ">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" aria-expanded="false" aria-controls="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#myPage">Chit Chat</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li class="c1"><a href="#">Login</a></li>
        <li class="c2"><a href="#">Sign Up</a></li>
        
      </ul>
    </div>
  </div>
</nav>

<div class="container div1" style="margin-top:10%;">
  <div class="row" id="d1">
  <div class="col-sm-12">
  <h3><b>Login</b></h3>
  <form class="" role="form"  action="login.php" method="get">
    <div class="form-group">
      <input type="text" class="form-control" id="example1" placeholder="username" name="name">
    </div>
    <div class="form-group">
      <input type="password" class="form-control" id="example2" placeholder="password" name="pass">
    </div>
    <button type="submit" class="btn btn-default div2">login</button>
  </form>
 </div>
</div>
<div class="row" id="d2">
  <div class="col-sm-12">
  <h3><b>Signup</b></h3>
  <form class="" role="form"  action="signup.php" method="get">
    <div class="form-group">
      <input type="text" class="form-control" id="example1" placeholder="username" name="name">
    </div>
    <div class="form-group">
      <input type="password" class="form-control" id="example2" placeholder="password" name="pass">
    </div>
    <div class="form-group">
      <input type="password" class="form-control" id="example3" placeholder="re-enter password" name="repass">
    </div>
    <button type="submit" class="btn btn-default div2" style="position:center;">Register</button>
  </form>
 </div>
</div>

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/freelancer.js"></script>
     <script>
    $(document).ready(function(){
    $(".c1").click(function(){
        $("#d1").show();
        $("#d2").hide();
    });
    $(".c2").click(function(){

        $("#d2").show();
        $("#d1").hide();
        $(".c2").active;
       
    });
});
    </script>

</body>
</html>
