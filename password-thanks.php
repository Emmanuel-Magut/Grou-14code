<!DOCTYPE html>
<html lang="en">
<head>
 <title>Password Changes</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
</head>
<body style="background-color:#EEE;">
	
<div class="container" style="margin-top:120px">

<!-- Center Column Content Section -->
<div class="col-sm-6 col-md-6 col-sm-offset-3 col-sm-">
<div class="alert alert-success">
    <!--  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> -->
  	 <strong>Success!</strong><br>Your password has been changed Successfully. You can now Login with your new password. <br/>
  	 <button type="button" class="btn btn-info btn-md"
 onclick="location.href = 'login_page.php'" >Login</button>
</div> 
  </div>
<!-- Right-side Column Content Section -->
 
 </div>
<!-- Footer Content Section -->
 <footer class="jumbotron text-center row"
 style="padding-bottom:1px; padding-top:8px;">
<?php include('footer.php'); ?>
 </footer>
</div>
</body>
</html>