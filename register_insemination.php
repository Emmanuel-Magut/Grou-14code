<?php
ob_start();
session_start(); 
if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 2) AND ($_SESSION['user_level'] != 3))
{ 
header("Location: login_page.php");
 exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   
    <title>Insemination</title>
    <style>
      *{
         padding: 0;
         margin: 0;
         box-sizing: border-box;
       }
       body{
        background:#EEE;
       }
      .row{
        background: #EFCDA8;
        border-radius: 30px;
        box-shadow: 6px 6px 6px grey;
      }
      img{
        border-top-left-radius: 30px;
         border-bottom-left-radius: 30px;
      }
      .btn1{
        border: none;
        outline: none;
        height: 50px;
        width: 100%;
        background-color: black;
        color: white;
        border-radius: 4px;
        font-weight: bold;
      }
      .btn1:hover{
        background: white;
        border: 1px solid;
        color: black;
      }

      form .error {
      color: #ff0000;
    }
       input.error, select.error, textarea.error{
       border: 1px red solid;
    }
</style>
    <!-- Bootstrap CSS File -->
 <link rel="stylesheet"
 href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
 integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
 crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<!-- jQuery -->
 <script type="text/javascript"  src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
<!-- jQueryUI -->
<script type = "text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" charset="utf-8"></script>
<!-- easing-->
<script src="js/jquery.easing.1.3.js"></script>
<!-- form validation-->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
<!-- animate -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
<!-- anythingSlider -->
 <script src="https://cdn.jquery.anythingslider.min.js"></script>
   <script type="text/javascript">
  $(document).ready(function(){
    $('#regins').validate({

    rules:{
      
      cow_id:{
        required:true,
        number: true
      },
      insemination_summary:{
        required: true
      }
      
    }

    });// end validate

  });// end ready
 </script>
  </head>
  <?php
if($_SERVER['REQUEST_METHOD']=='POST'){
require('process_register_insemination.php');
}
?>
<body style="background-color:#EEE;">
  <header>
    <?php include('header.php'); ?>
</header>
<div class="container">
<section class="Form my-4 mx-5" style="position:absolute; top:130px;">
<div class="container">
<div class="row no-gutters">
<div class="col-lg-5">
<img src="https://ae01.alicdn.com/kf/Sb4c2981628e04e2d895bb93f0c2451b70.jpg" class="img-fluid" alt="cow"/>
</div> 
<div class="col-lg-7 px-5">
              
<h1 class="font-weight-bold ">Register Insemination.</h1>
<form action="register_insemination.php" method="post" enctype="multipart/form-data" name="regins" id="regins" onsubmit="return checked()";>
<div class="form-row">
<div class="col-lg-7">
<label for="cow_id">Cow Id:</label><br>
<input type="text" class="form-control" id="cow_id" name="cow_id"  maxlength="30" required value="<?php if(isset($_POST['cow_id'])) echo $_POST['cow_id'];?>" >
</div>
</div>

<div class="form-row">
<div class="col-lg-7">
<label for="insemination_summary">Insemination Summary:</label><br>
<textarea name="insemination_summary" rows="8" id="insemination_summary" class="form-control" placehplder="Say Something About Insemination" required value="<?php if(isset($_POST['insemination_summary'])) echo $_POST['insemination_summary'];?>"></textarea>
</div>
</div>

<div class="form-row">
<div class="col-lg-7">
<button type="submit" class="btn1 mt-3 mb-2">Register</button>
</div>
</div>
</form>
</div>
</div>
</div>
</section>
</div>
</body>
</html>