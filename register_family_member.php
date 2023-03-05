<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   
    <title>Register Account</title>
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
        height: 40px;
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
     $('#registermember').validate({
      rules:{
        first_name:{
          required: true
        },
        last_name:{
          required: true
        },
        gender:{
          required: true
        },
        email:{
          required: true,
          email: true
        },
        password1:{
          required: true,
          rangelength:[8,12]
        },
        password2:{
          required: true,
          equalTo:'#password1'
        },
        relationship:{
          required: true
        },
        profile_photo:{
          required: true
        },

        messages:{
          first_name:"Please Enter First Name",
          last_name:"Please Enter Last Name",
          gender:"please Select Gender",
          email:{
                required:"Please Enter Your Email",
                email: "Please Enter a valid email address"
          },
          password1:{
            required: "Enter Password",
            rangelength:"Password Must Be atleast 8 to 12 characters."
          },
          password2:{
            required: "This field cannot be empty!",
            equalTo: "Ooops The two passwords Don't match."
          },
          relationship:"Please enter this field"

        }//end messages


            

      }//end rules

     });//end validate
     $('#first_name').focus();
  })//end ready
 </script>
</head>
  <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
 require('process_register_family_member.php');
} 
?>
<body style="background-color:#EEE;">
<div class="container">
<section class="Form my-4 mx-5" style="position:absolute; top:80px;">
<div class="container">
<div class="row no-gutters">
<div class="col-lg-5">
<img src="https://www.quinns.ie/wp-content/uploads/2017/02/Dairy-Cow-Calf.jpg" class="img-fluid" alt="cow"/>
</div> 
<div class="col-lg-7 px-5">
              
<h3 class="font-weight-bold ">Register Account:</h3>
<form action="register_family_member.php" method="post" id="registermember" name="registermember"enctype= "multipart/form-data" onsubmit="return checked()";>
<div class="form-row">
<div class="col-lg-7">
<label for="first_name">Full Name:</label><br>
<input type="text" class="form-control" id="first_name" name="first_name" placeholder="Full Name" maxlength="30" required value="<?php if(isset($_POST['first_name'])) echo $_POST['first_name'];?>" >
</div>
</div>

<div class="form-row">
<div class="col-lg-7">
<label for="email">Email:</label><br>
<input type="email" class="form-control" id="email" name="email" placeholder="E-mail" maxlength="60" required value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>" >
</div>
</div>

<div class="form-row">
<div class="col-lg-7">
<label for="password1">Password:</label><br>
<input type="password" class="form-control" id="password1" name="password1"
 
 placeholder="Password" minlength="8" maxlength="12" required
 value=
 "<?php if (isset($_POST['password1']))
 echo htmlspecialchars($_POST['password1'], ENT_QUOTES); ?>" >
</div>
</div>
<div class="form-row">                                                               
<div class="col-lg-7">
<label for="password2" >Confirm Password:</label>
<input type="password" class="form-control" id="password2" name="password2" placeholder="confirm password" minlength="8" maxlength="12" required value="<?php if(isset($_POST['password2'])) echo $_POST['password2'];?>">
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
