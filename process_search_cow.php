<!DOCTYPE html>
<html>
<head>
	<title>Cow Search</title>
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
			<div class="col-xs-4 col-lg-6 col-lg-offset-2">
				<?php
try
{
 // This script retrieves records from the users table.
require ('mysqli_connect.php'); // Connect to the db.
 echo '<p class="text-center">If no record is shown, ';
 echo 'this is because you had an incorrect ';
 echo ' or missing entry in the search form.</p>';
 // #1
 $serial_no_name = htmlspecialchars($_POST['serial_no_name'], ENT_QUOTES);
 // Since it's a prepared statement below this sanitizing is not needed
 // However, to consistently retrieve than sanitize is a good habit
 // #2
 $query = "SELECT serial_no_name, gender, breed_type, year_of_birth, cow_photo,";
 $query .= "DATE_FORMAT(registration_date, '%M %d, %Y')";
 $query .=" AS regdat, cow_id FROM cows WHERE ";
 $query .= "serial_no_name=?";
// $query .="ORDER BY registration_date ASC ";
 $q = mysqli_stmt_init($dbcon);
 mysqli_stmt_prepare($q, $query);
 // bind values to SQL Statement
 mysqli_stmt_bind_param($q, 's', $serial_no_name);
 // execute query
 mysqli_stmt_execute($q);
 $result = mysqli_stmt_get_result($q);
 if ($result) { // If it ran, display the records.
 // Table header.
 echo '<table class="table table-striped">
 <tr>
 <th scope="col">Edit</th>
 <th scope="col">Delete</th>
 <th scope="col">Serial_No/Name</th>
 <th scope="col">Cow_Id</th>
 <th scope="col">Gender</th>
 <th scope="col">breed_type</th>
 <th scope="col">Year Of Birth</th>
 <th scope="col">Photo</th>
 <th scope="col">Date Registered</th>
 </tr>';
 // Fetch and display the records:
 while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
 // Remove special characters that might already be in table to
 // reduce the chance of XSS exploits
 $cow_id = htmlspecialchars($row['cow_id'], ENT_QUOTES);
 $serial_no_name =
 htmlspecialchars($row['serial_no_name'], ENT_QUOTES);
 $gender =
 htmlspecialchars($row['gender'], ENT_QUOTES);
 $breed_type =
 htmlspecialchars($row['breed_type'], ENT_QUOTES);
 $year_of_birth=
 htmlspecialchars($row['year_of_birth'], ENT_QUOTES);
 $cow_photo =
 htmlspecialchars($row['cow_photo'], ENT_QUOTES);
 $registration_date =
 htmlspecialchars($row['regdat'], ENT_QUOTES);
 echo '<tr>

<td><a href="edit_cow_details.php?id=' . $cow_id .
 '">Edit</a></td>
 <td><a href="delete_cow.php?id=' . $cow_id .
 '">Delete</a></td>
 <td>' . $serial_no_name . '</td>
 <td>' . $cow_id . '</td>
 <td>' . $gender . '</td>
 <td>' . $breed_type . '</td>
 <td>' . $year_of_birth . '</td>
 <td><img src="images/'. $cow_photo . '" class="img-fluid img-rounded" height="200" width="200"></td>
<td>' . $registration_date . '</td>
 </tr>';
 }
 echo '</table>'; // Close the table.
 //
 mysqli_free_result ($result); // Free up the resources.
 } else { // If it did not run OK.
 // Public message:
echo '<p class="text-center">The current records could not be retrieved.';
 echo 'We apologize for any inconvenience.</p>';
 // Debugging message:
 //echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
 //Show $q is debug mode only
 }
// End of if ($result). Now display the total number of records/members.
 mysqli_close($dbcon); // Close the database connection.
 }
 catch(Exception $e)
 {
 print "The system is currently busy. Please try later.";
 print "An Exception occurred. Message: " . $e->getMessage();
 }
 catch(Error $e)
 {
 print "The system us busy. Please try later.";
 print "An Error occurred. Message: " . $e->getMessage();
 }

?>
</body>
</html>
