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
   
    <title>Milk Production.</title>
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
    $('#production').validate({

    rules:{
      
      litres_produced:{
        required:true
      },
      litres_sold:{
        required: true
      }
      
    }

    });// end validate

  });// end ready
 </script>
  </head>
  <?php
if($_SERVER['REQUEST_METHOD']=='POST'){
require('process_register_production.php');
}
?>
<body style="background-color:#EEE;">
  <header>
    <?php include('header.php'); ?>
</header>
<div class="container" style="margin-top:140px;">
<section class="Form my-4 mx-5">
<div class="container">
<div class="row no-gutters">
<div class="col-lg-5">
<img src="https://i.pinimg.com/736x/88/92/0c/88920c32d414250366dc30780ea573ee.jpg" class="img-fluid" alt="cow"/>
</div> 
<div class="col-lg-7 px-5">
              
<h1 class="font-weight-bold ">Daily Production.</h1>
<form action="register_production.php" method="post" enctype="multipart/form-data" id="production" name="producrion" onsubmit="return checked()";>
<div class="form-row">
<div class="col-lg-7">
<label for="litres_produced">Litres Produced:</label><br>
<input type="number" min="0" max="1000" class="form-control" id="litres_produced" name="litres_produced" placeholder="Litres Produced" maxlength="30" required value="<?php if(isset($_POST['litres_produced'])) echo $_POST['litres_produced'];?>" >
</div>
</div>

<div class="form-row">
<div class="col-lg-7">
<label for="litres_sold">Litres Sold:</label><br>
<input type="number" min="0" max="1000" class="form-control" id="litres_sold" name="litres_sold" placeholder="Litres Sold" maxlength="30" required value="<?php if(isset($_POST['litres_sold'])) echo $_POST['litres_sold'];?>" >
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