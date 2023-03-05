<?php
ob_start();
session_start(); 
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
   
    <title>Personal Journal.</title>
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
    $('#notes').validate({

    rules:{
      
      title:{
        required:true
      },
      content:{
        required: true
      }
      
    }

    });// end validate

  });// end ready
 </script>
  </head>
  <?php
if($_SERVER['REQUEST_METHOD']=='POST'){
require('process_add_notes.php');
}
?>
<body style="background-color:#EEE;">
  <header>
    <?php include('header.php'); ?>
</header>
<div class="container" style="margin-top:130px;">
<section class="Form my-4 mx-5" >
<div class="container">
   <h1 class="font-weight-bold" style="text-align:center; font-family:Copper Black;">Personal Journal</h1>
<div class="row no-gutters">
<div class="col-lg-5">
<img src="http://d27p2a3djqwgnt.cloudfront.net/wp-content/uploads/2018/12/31060006/ohio-114092_1280-e1570735202840.jpg" class="img-fluid" alt="cow"/>

</div>
<div class="col-lg-7 px-5">
              
 <form action="add_notes.php" method="post" enctype="multipart/form-data" id="notes" name="notes" onsubmit="return checked()";>
<div class="form-row">
<div class="col-lg-7">
<label for="title">Title:</label><br>
<input type="text"  class="form-control" id="title" name="title" placeholder="Note Title" maxlength="50" required value="<?php if(isset($_POST['title'])) echo $_POST['title'];?>" >
</div>
</div>

<div class="form-row">
<div class="col-lg-7">
<label for="content">Content:</label><br>
<textarea name="content" class="form-control" id="content" placeholder="Personal Journal!" cols=50 rows=6 required value="<?php if(isset($_POST['content'])) echo $_POST['content'];?>"></textarea>
</div>
</div>

<div class="form-row">
<div class="col-lg-7">
<button type="submit" class="btn1 mt-3 mb-2">Add Note</button>
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