<?php
// check if form was submitted
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['cow_photo'])) {
  
  // define upload directory and create if it doesn't exist
  $upload_dir = 'images/';
  if(!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true);
  }
  
  // get details of uploaded file
  $file_name = $_FILES['cow_photo']['name'];
  $file_size = $_FILES['cow_photo']['size'];
  $file_tmp = $_FILES['cow_photo']['tmp_name'];
  $file_type = $_FILES['cow_photo']['type'];
  
  // check if uploaded file is an image
  $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
  $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
  if(!in_array($file_extension, $allowed_extensions)) {
    echo 'Error: Only JPG, JPEG, PNG, and GIF files are allowed.';
    exit();
  }
  
  // move uploaded file to destination folder
  $destination = $upload_dir . $file_name;
  if(move_uploaded_file($file_tmp, $destination)) {
    echo 'Image uploaded successfully.';
  } else {
    echo 'Error uploading image.';
    exit();
  }
  
  // save a copy of the uploaded image in a folder
  $copy_dir = 'image-copies/';
  if(!is_dir($copy_dir)) {
    mkdir($copy_dir, 0777, true);
  }
  $copy_destination = $copy_dir . $file_name;
  copy($destination, $copy_destination);
  echo 'Image copy saved successfully.'; 
}
  



$errors = array(); // Initialize an error array. #1
 
$serial_no_name = filter_var( $_POST['serial_no_name'], FILTER_SANITIZE_STRING);
$gender= filter_var( $_POST['gender'], FILTER_SANITIZE_STRING);
$breed_type = filter_var( $_POST['breed_type'], FILTER_SANITIZE_STRING);
$year_of_birth = filter_var( $_POST['year_of_birth'], FILTER_SANITIZE_STRING);
$cow_photo = $_FILES['cow_photo']['name'];
//$registration_date = filter_var( $_POST['registration_date'], FILTER_SANITIZE_STRING);

 

if (empty($errors)) { // If everything's OK. #4
try {

 require ('mysqli_connect.php'); // Connect to the db. //#6
 // Make the query: #
  
  $query = "INSERT INTO cows (cow_id, serial_no_name, gender, breed_type, year_of_birth, cow_photo, registration_date)";
 $query .="VALUES(' ', ?, ?, ?, ?, ?, NOW())"; //#8
  $dbcon= new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
 $q = mysqli_stmt_init($dbcon); //#9
 mysqli_stmt_prepare($q, $query);
 // use prepared statement to ensure that only text is inserted
 // bind fields to SQL Statement
 mysqli_stmt_bind_param($q, 'sssss', $serial_no_name, $gender, $breed_type, $year_of_birth, $cow_photo);
 // execute query
 mysqli_stmt_execute($q);
 if (mysqli_stmt_affected_rows($q) == 1) { // One record inserted #10
 header ("location: cow_thanks.php");
 exit();
 } else { // If it did not run OK.
 // Public message:
 $errorstring = "<p class='text-center col-sm-8' 
style='color:red'>";
 $errorstring .= "System Error<br />You could not be registered due ";
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
 print "An Exception occurred. Message: " . $e->getMessage();
 print "The system is busy please try later";
 }
 catch(Error $e)
 {
 print "An Error occurred. Message: " . $e->getMessage();
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