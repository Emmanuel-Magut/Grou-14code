<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   
    <title>Login</title>
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
 
 $('#loginform').validate({
    rules:{
      email:{
        required: true,
        email:true
      },
      password:{
        required: true,
        rangelength:[8,12]
      },

      messages:{
        email:{
          required:"please input your email",
          email:"please enter a valid email"
        },
        password:{
          reqired:"Please Enter You Password",
          rangelength:"Your Password Must Be atleast 8 to 12 Characters"
        }
      }
    }
 }); 
  $('#email').focus();
 
  }); // end document ready
</script>
  </head>
  <body style="background-color:#EEE;">
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
 require('process_login.php');
} // End of the main Submit conditional.
?>

<div class="container" style="margin-top:90px;">
  <section class="Form my-4 mx-5" >
         <div class="container">
            <div class="row no-gutters">
             <div class="col-lg-5">
              <img src="https://www.quinns.ie/wp-content/uploads/2017/02/Dairy-Cow-Calf.jpg" class="img-fluid" alt="cow" />
             </div>
             <div class="col-lg-7 px-5">
              
              <h1 class="font-weight-bold ">Welcome To Our Farm!</h1>
              <h4>Sign into your account</h4>
              
              <form action="login_page.php" method="post" id="loginform">
                 <div class="form-row">
                  <div class="col-lg-7">
                    <input type="email" placeholder="Email-Address" class="form-control my-1 p-4"  name="email" id="email" required value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
                  </div>
                 </div>

                 <div class="form-row">
                  <div class="col-lg-7">
                    <input type="password" placeholder="********" class="form-control my-1 p-4" name="password" id="password" required value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>">
                  </div>
                 </div>

                 <div class="form-row">
                  <div class="col-lg-7">
                    <button type="submit" class="btn1 mt-3 mb-2">Login</button>
                  </div>
                 </div>
                 <a href="#">Forgot Password?</a>
                 <p>Don't have an account? <a href="register_family_member.php">Register here</a></p>
               </form>

             </div>

          </div>
         </div>

        </section>
      </div>
    </body>
</html>
