
<?php
ob_start();
session_start(); //#1
if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 3))
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
   
    <title>Register Cow</title>
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
    $('#registercow').validate({
      rules:{
             serial_no_name:{
              required: true
             } ,
             gender:{
              required:true
             },
            
             
              cow_photo:{
              required: true
             }
      }// end rules
 }); //end validate
    });// end ready
    </script>
   
</head>
  <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
 require('process_register_cow.php');
} 
?>
<body style="background-color:#EEE;">
  <header>
    <?php include('header.php'); ?>
</header>
<div class="container" style="margin-top:110px;">


<section class="Form my-4 mx-5" style="margin-top:110px;">
<div class="container">
  <h1 class="font-weight-bold" style="text-align:center; font-family:Copper Black;">Register New Cow</h1>
<div class="row no-gutters">
<div class="col-lg-5">
<img src="http://d27p2a3djqwgnt.cloudfront.net/wp-content/uploads/2018/01/09060054/cow-354428_1280.jpg" class="img-fluid" alt="cow"/>
</div> 
<div class="col-lg-7 px-5">
              
 <form action="register_cow.php" method="post" enctype="multipart/form-data" id="registercow" name="registercow" onsubmit="return checked()";>
<div class="form-row">
<div class="col-lg-7">
<label for="serial_no_name">Serial_No/Name:</label><br>
<input type="text" class="form-control" id="serial_no_name" name="serial_no_name" placeholder="Serial_No/Name" maxlength="30" required value="<?php if(isset($_POST['serial_no_name'])) echo $_POST['serial_no_name'];?>" >
</div>
</div>

<div class="form-row">
<div class="col-lg-7">
<label for="gender">Gender:</label><br>
<select name="gender" placeholder="Gender" required id="gender" value="<?php if(isset($_POST['gender'])) echo $_POST['gender'];?>" >
  <option value="male">Male</option>
  <option value="female">Female</option>
</select>
</div>
 </div>

<div class="form-row">
<div class="col-lg-7">
<label for="breed_type">Breed/Type:</label><br>
<input type="text" class="form-control" id="breed_type" name="breed_type" placeholder="Breed" maxlength="60" value="<?php if(isset($_POST['breed_type'])) echo $_POST['breed_type'];?>" >
</select>
</div>
</div>

<div class="form-row">
<div class="col-lg-7">
<label for="year_of_birth">Birth  Year:</label><br>
<input type="text" class="form-control" id="year_of_birth" name="year_of_birth" placeholder="Birth Year" maxlength="15"  value="<?php if(isset($_POST['year_of_birth'])) echo $_POST['year_of_birth'];?>" > 
</div>
</div>

 <div class="form-row">
<div class="col-lg-7">
<label for="cow_photo">Photo:</label><br>
<input type="file" class="form-control" id="cow_photo" name= "cow_photo" placeholder="cow_Photo"   value="<?php if(isset($_POST['cow_photo'])) echo $_POST['cow_photo'];?>">
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
