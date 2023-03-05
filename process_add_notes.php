<?php
 $errors = array(); // Initialize an error array. #1
 
$title = filter_var( $_POST['title'], FILTER_SANITIZE_STRING);
$content= filter_var( $_POST['content'], FILTER_SANITIZE_STRING);
//$date_produced = filter_var( $_POST['date_produced'], FILTER_SANITIZE_STRING);

 

if (empty($errors)) { // If everything's OK. #4
try {

 require ('mysqli_connect.php'); // Connect to the db. //#6
 // Make the query: #
$query="INSERT INTO personal_notes (notes_id, date_written, title, content) VALUES(' ', NOW(), ?, ?);";
 //#8
  $dbcon= new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
 $q = mysqli_stmt_init($dbcon); //#9
 mysqli_stmt_prepare($q, $query);
 // use prepared statement to ensure that only text is inserted
 // bind fields to SQL Statement
 mysqli_stmt_bind_param($q, 'ss', $title, $content);
// mysqli_stmt_bind_param($q, 's', $serial_no_name);
 // execute query
 mysqli_stmt_execute($q);
 if (mysqli_stmt_affected_rows($q) == 1) { // One record inserted #10
 header ("location: notes_thanks.php");
 exit();
 } else { // If it did not run OK.
 // Public message:
 $errorstring = "<p class='text-center col-sm-8' 
style='color:red'>";
 $errorstring .= "System Error<br />The record could nott be added due ";
 $errorstring .= "to a system error. We apologize for any 
inconvenience.</p>";
 echo "<p class=' text-center col-sm-2' 
style='color:red'>$errorstring</p>";
 // Debugging message below do not use in production
 echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $query . '</p>';
 mysqli_close($dbcon); // Close the database connection.
 // include footer then close program to stop execution
 echo '<footer class="jumbotron text-center col-sm-12"
 style="padding-bottom:1px; padding-top:8px;">
 include("footer.php");
 </footer>';
 exit();
 }
 }
 catch(Exception $e) // We finally handle any problems here #11
 {
 // print "An Exception occurred. Message: " . $e->getMessage();
 print "The system is busy please try later";
 }
 catch(Error $e)
 {
 //print "An Error occurred. Message: " . $e->getMessage();
 print "The system is busy please try again later.";
 }
 } else { // Report the errors. #12
 $errorstring = "Error! The following error(s) occurred:<br>";
 foreach ($errors as $msg) { // Print each error.
 $errorstring .= " - $msg<br>\n";
 }
 $errorstring .= "Please try again.<br>";
 echo "<p class=' text-center col-sm-2' style='color:red'>$errorstring</p>";
 }// End of if (empty($errors)) IF.
?>