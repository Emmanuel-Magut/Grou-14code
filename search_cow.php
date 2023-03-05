<?php
session_start(); //#1
if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 2)  AND ($_SESSION['user_level'] !=3))
{ 
header("Location: login_page.php");
 exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Search Cow</title>
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
 		$('#searchcow').validate({

 		rules:{
 			serial_no_name:{
 				required:true,
 				
 			}
 			
 		}

 		})// end validate

 	});// end ready
 </script>
</head>
<body style="background-color:#EEE;">
	<header>
    <?php include('header.php'); ?>
</header>
	<div class="container" style="margin-top:100px;">
		<div class="row">
			<div class="col-xs-6 col-md-6 col-lg-4 col-lg-offset-4">

			<h2 class="h2 text-center">Cow Search:</h2>
<h6 class="text-center">Cow Serial_No/Name is Required:</h6>
<form action="process_search_cow.php" method="post" id="searchcow" name="searchcow">

 <p><label for="serial_no_name">Serial_No/Name:</label><br>
 <input type="text" class="form-control" id="serial_no_name" name="serial_no_name"
 placeholder="Serial_No/Name?" maxlength="30" required
 value=
 "<?php if (isset($_POST['serial_no_name']))
echo htmlspecialchars($_POST['serial_no_name'], ENT_QUOTES); ?>" >
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