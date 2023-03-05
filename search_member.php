<?php
session_start(); //#1
if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 3))
{ 
header("Location: login_page.php");
 exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Search Member</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<style type="text/css">
		form .error {
  color: #ff0000;

}
input.error, select.error, textarea.error{
	border: 1px red solid;
}
	</style>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- jQuery -->
    <script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
   <!-- <script type="text/javascript"  src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- jQueryUI -->
    <script type = "text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" charset="utf-8"></script>
<!-- easing-->
<script src="js/jquery.easing.1.3.js"></script>
<!-- form validation-->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
<!-- anythingSlider -->
 <script src="https://cdn.jquery.anythingslider.min.js"></script>
 <script type="text/javascript">
 	$(document).ready(function(){
 		$('#searchmember').validate({

 		rules:{
 			email:{
 				required:true,
 				email:true
 			},

 			 messages:{
                 email:{
                required:"Please Enter Your Email",
                email: "Please Enter a valid email address"
          }


 			 }//end messages
 			
 		}//end rules

 		})// end validate

 	});// end ready
 </script>
</head>
<body style="background-color:#EEE";>

	<header>
    <?php include('header.php'); ?>
</header>
<div class="container" style="margin-top:120px;">
		<div class="row">
			<div class="col-xs-6 col-md-6 col-lg-6 col-lg-offset-3">

			<h2 class="h2 text-center">Search Member:</h2>
<h6 class="text-center">Email Address Required:</h6>
<form action="process_search_member.php" method="post" id="searchmember" name="searchmember">

 <p><label for="email">Email</label><br>
 <input type="text" class="form-control" id="email" name="email"
 placeholder="E-mail" maxlength="30" required
 value=
 "<?php if (isset($_POST['first_name']))
echo htmlspecialchars($_POST['email'], ENT_QUOTES); ?>" >
 </p>

 

<p><div class="col-sm-8">
 <input id="submit" class="btn btn-primary" type="submit"
 name="submit" value="Search"></div>
</div>
</form>
			</div>
		</div> <!-- end row div -->
	</div> <!-- end container div-->
</body>
</html>