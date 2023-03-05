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
	<title>Delete Member</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
<!-- animate-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
<!-- anythingSlider -->
 <script src="https://cdn.jquery.anythingslider.min.js"></script>
</head>
<body style="background-color:#EEE;">
	<header>
    <?php include('header.php'); ?>
</header>
	<div class="container" style="margin-top:100px;">
		<div class="row">
			<div class="col-xs-6 col-md-6 col-lg-12">
    <?php
try {
// Check for a valid user ID, through GET or POST: #1
if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) {
// From view_users.php
 $id = htmlspecialchars($_GET['id'], ENT_QUOTES);
} else
if ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) {
 // Form submission.
 $id = htmlspecialchars($_POST['id'], ENT_QUOTES);
 } else { // No valid ID, kill the script.
 // return to login page
 header("Location: login.php");
 exit();
 }
 require ('mysqli_connect.php');
 // Check if the form has been submitted: #2
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 $sure = htmlspecialchars($_POST['sure'], ENT_QUOTES);
 if ($sure == 'Yes') { // Delete the record.
 // Make the query:
 // Use prepare statement to remove security problems
 $q = mysqli_stmt_init($dbcon);
 mysqli_stmt_prepare($q, 'DELETE FROM family_members WHERE member_id=? LIMIT 1');
 // bind $id to SQL Statement
 mysqli_stmt_bind_param($q, "s", $id);
 // execute query
 mysqli_stmt_execute($q);
 if (mysqli_stmt_affected_rows($q) == 1) { // It ran OK
 // Print a message:
 echo '<h3 class="text-center">The record has been deleted.</h3>';
 } else { // If the query did not run OK display public message
 echo '<p class="text-center">The member could not be deleted.';
 echo '<br>Either the member does not exist or due to a system error.</p>';
 echo '<p>' . mysqli_error($dbcon ) . '<br />Query: ' . $q . '</p>';
 // Debugging message. When live comment out because this displays SQL
 }
 } else { // User did not confirm deletion.
 echo '<h3 class="text-center">The user has NOT been deleted as ';
 echo 'you requested</h3>';
 }
 } else { // Show the form. #3
 $q = mysqli_stmt_init($dbcon);
 $query = "SELECT CONCAT(first_name, ' ', last_name) FROM ";
 $query .= "family_members WHERE member_id=?";
 mysqli_stmt_prepare($q, $query);
 // bind $id to SQL Statement
 mysqli_stmt_bind_param($q, "s", $id);
 // execute query
 mysqli_stmt_execute($q);
$result = mysqli_stmt_get_result($q);
 $row = mysqli_fetch_array($result, MYSQLI_NUM); // get user info
 if (mysqli_num_rows($result) == 1) {
 // Valid user ID, display the form.
 // Display the record being deleted: #4
 $user = htmlspecialchars($row[0], ENT_QUOTES);
?>
<h2 class="h2 text-center">
Are you sure you want to permanently delete <?php echo $user; ?>?</h2>
<form action="delete_family_member.php" method="post"
 name="deleteform" id="deleteform">
<div class="form-group row">
 <label for="" class="col-sm-4 col-form-label"></label>
<div class="col-sm-8" style="padding-left: 70px;">
 <input type="hidden" name="id" value="<?php echo $id; ?>">
 <input id="submit-yes" class="btn btn-primary" type="submit" name="sure" 
value="Yes"> 
 

 <input id="submit-no" class="btn btn-primary" type="submit" name="sure" value="No">
</div>
</div>
</form>
<?php
 } else { // Not a valid user ID.
 echo '<p class="text-center">This page has been accessed in error.</p>';
 }
 } // End of the main submission conditional.
  $q = mysqli_stmt_init($dbcon);
 mysqli_stmt_close($q);
 mysqli_close($dbcon );
 }
 catch(Exception $e)
 {
 //print "The system is busy. Please try again.";
 //print "An Exception occurred. Message: " . $e->getMessage();
 }
 catch(Error $e)
 {
 //print "The system is currently busy. Please try again soon.";
 //print "An Error occurred. Message: " . $e->getMessage();
 }
?>


			</div>
		</div> <!-- end row div -->
	</div> <!-- end container div-->
	</body>
	</html>