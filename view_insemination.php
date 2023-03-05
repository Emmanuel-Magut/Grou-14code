<?php
session_start(); //#1
if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 3)  AND ($_SESSION['user_level'] !=2))
{ 
header("Location: login_page.php");
 exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>View Insemination</title>
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
	<div class="container" style="margin-top:120px;">
		<div class="row">
			<div class="col-xs-8 col-lg-8 col-lg-offset-2">
           <h1>Insemination Records</h1>
     
           <?php
try {
 // This script retrieves all the records from the users table.
 require('mysqli_connect.php'); // Connect to the database.
 //set the number of rows per display page
 $pagerows = 10; // #1
 // Has the total number of pages already been calculated?
 if ((isset($_GET['p']) && is_numeric($_GET['p']))) {
 //already been calculated
 $pages = htmlspecialchars($_GET['p'], ENT_QUOTES);
 // make sure it is not executable XSS
 }else{//use the next block of code to calculate the number of pages #2
 //First, check for the total number of records
 $q = "SELECT COUNT(insemination_id) FROM insemination";
 $result = mysqli_query ($dbcon, $q);
 $row = mysqli_fetch_array ($result, MYSQLI_NUM);
$records = htmlspecialchars($row[0], ENT_QUOTES);
 // make sure it is not executable XSS
 //Now calculate the number of pages
 if ($records > $pagerows){ // #3
 //if the number of records will fill more than one page
 //Calculate the number of pages and round the result up to the
 // nearest integer
 $pages = ceil ($records/$pagerows); //
 }else{
 $pages = 1;
 }
 }//page check finished
 //Declare which record to start with #4
 if ((isset($_GET['s'])) &&( is_numeric($_GET['s'])))
 {
 $start = htmlspecialchars($_GET['s'], ENT_QUOTES);
 // make sure it is not executable XSS
 }else{
 $start = 0;
 }

 $query = "SELECT cows.cow_id, cows.serial_no_name, cows.cow_photo, insemination.insemination_id, insemination.date_inseminated, insemination.insemination_summary FROM insemination INNER JOIN cows ON insemination.cow_id=cows.cow_id"; // #5

 $query .=" LIMIT ?, ?";
 $q = mysqli_stmt_init($dbcon);
 mysqli_stmt_prepare($q, $query);
 // bind start and pagerows to SQL Statement
 mysqli_stmt_bind_param($q, "ii", $start, $pagerows);
 // execute query
 mysqli_stmt_execute($q);
 $result = mysqli_stmt_get_result($q);
 if ($result) {
 // If it ran OK (records were returned), display the records.
 // Table header.
 echo '<table class="table table-striped table-hover table-responsive">
 <tr>
 <th scope="col">Edit</th>
 <th scope="col">Delete</th>
 <th scope="col">Serial_no/Name</th>
 <th scope="col">Photo</th>
 <th scope="col">Date Inseminated</th>
 <th scope="col">Insemination Summary</th>
  </tr>';
 // Fetch and print all the records:
 while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
 // Remove special characters that might already be in table to
 // reduce the chance of XSS exploits
 $cow_id = htmlspecialchars($row['cow_id'], ENT_QUOTES);
 $serial_no_name=htmlspecialchars($row['serial_no_name'], ENT_QUOTES);
 $cow_photo = htmlspecialchars($row['cow_photo'], ENT_QUOTES);
 $insemination_id =htmlspecialchars($row['insemination_id'], ENT_QUOTES);
 $date_inseminated = htmlspecialchars($row['date_inseminated'], ENT_QUOTES);
 $insemination_summary =htmlspecialchars($row['insemination_summary'], ENT_QUOTES);

 
 echo '<tr>
 <td><a href="#" class="btn btn-success btn-sm">Edit</a></td>
 <td><a href="delete_insemination.php?id=' . $insemination_id .'" class="btn btn-danger btn-sm">Delete</a></td>
 <td>' . $serial_no_name. '</td>
 <td><img src="images/' . $cow_photo . '" class="img-fluid img-rounded" height="180"></td>
 <td>' . $date_inseminated .'</td>
 <td>' . $insemination_summary .'</td>
 </tr>';
 }
 echo '</table>'; // Close the table.
 mysqli_free_result ($result); // Free up the resources.
 }
 else { // If it did not run OK.
 // Error message:
 echo '<p class="text-center">The record could not be ';
 echo 'retrieved. We apologize for any inconvenience.</p>';
 // Debug message:
 // echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
 exit;
 } // End of else ($result)
 // Now display the total number of records/members. #6
 $q = "SELECT COUNT(insemination_id) FROM insemination";
 $result = mysqli_query ($dbcon, $q);
 $row = mysqli_fetch_array ($result, MYSQLI_NUM);
 $members = htmlspecialchars($row[0], ENT_QUOTES);
 mysqli_close($dbcon); // Close the database connection.
 $echostring = "<p class='text-center'>Total records: $members </p>";
 $echostring .= "<p class='text-center'>";
 if ($pages > 1) { // #7
 //What number is the current page?
 $current_page = ($start/$pagerows) + 1;
 //creates the link of the prev page
 if ($current_page != 1) {
 $echostring .=
 ' <a href="view_insemination.php?s=' . ($start - $pagerows) .
 '&p=' . $pages . '">previous</a> ';
 }
 //Create a Next link 
 if ($current_page != $pages) {
 $echostring .=
 ' <a href="view_insemination.php?s=' . ($start + $pagerows) .
 '&p=' . $pages . '">Next</a> ';
 }
 $echostring .= '</p>';
 echo $echostring;
 }
} //end of try
catch(Exception $e) // all problems are handled here
{
// print "An Exception occurred. Message: " . $e->getMessage();
 print "The system is busy please try later";
}
catch(Error $e)
{
// print "An Error occurred. Message: " . $e->getMessage();
 print "The system is busy please try again later.";
}
?>
            
			</div>
		</div> <!-- end row-->
    <footer class="jumbotron text-center row"
 style="padding-bottom:1px; padding-top:8px;">
<?php include('footer.php'); ?>
 </footer>
	</div>
</body>
</html>