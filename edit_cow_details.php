<?php
ob_start();
session_start(); //#1
if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 3))
{ 
header("Location: login_page.php");
 exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Edit Cow Details</title>
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
</head>

	
<body style="background-color:#EEE;">
  <header>
    <?php include('header.php'); ?>
</header>
<div class="container" style="margin-top:110px;">
<?php
 try
 {
 
 
 // The code looks for a valid cow ID, either through GET or POST:
 if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) {
 // From view_users.php
 $id = htmlspecialchars($_GET['id'], ENT_QUOTES);
 } elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) {
 // Form submission.
 $id = htmlspecialchars($_POST['id'], ENT_QUOTES);
 } else { // No valid ID, kill the script.
 echo '<p class="text-center">This page has been accessed in error.</p>';
 include ('footer.php');
 exit();
 }
require ('mysqli_connect.php');
 // Has the form been submitted?
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$errors = array();
$serial_no_name = filter_var( $_POST['serial_no_name'], FILTER_SANITIZE_STRING);
$gender= filter_var( $_POST['gender'], FILTER_SANITIZE_STRING);
$breed_type = filter_var( $_POST['breed_type'], FILTER_SANITIZE_STRING);
$year_of_birth = filter_var( $_POST['year_of_birth'], FILTER_SANITIZE_STRING);
$cow_status = filter_var( $_POST['cow_status'], FILTER_SANITIZE_STRING);
 

if (empty($errors)) { // If everything's OK. #3
 $q = mysqli_stmt_init($dbcon);
 $query = 'SELECT cow_id FROM cows WHERE serial_no_name=? AND cow_id !=?';
 mysqli_stmt_prepare($q, $query);
 // bind $id to SQL Statement
 mysqli_stmt_bind_param($q, 'si', $email, $id);
 // execute query
 mysqli_stmt_execute($q);
 $result = mysqli_stmt_get_result($q);
 if (mysqli_num_rows($result) == 0) {
 // e-mail does not exist in another record #4
 $query = 'UPDATE cows SET serial_no_name=?, gender=?, breed_type=?, year_of_birth=?, cow_Status=?';
 $query .= ' WHERE cow_id=? LIMIT 1';
 $q = mysqli_stmt_init($dbcon);
 mysqli_stmt_prepare($q, $query);
 // bind values to SQL Statement
mysqli_stmt_bind_param($q, 'sssssi', $serial_no_name, $gender, $breed_type, $year_of_birth, $cow_status, $id);
 // execute query
 mysqli_stmt_execute($q);
 if (mysqli_stmt_affected_rows($q) == 1) { // Update OK
 // Echo a message if the edit was satisfactory:
 echo '<h3 class="text-center">The record has been edited.</h3>';
 } else { // Echo a message if the query failed.
 echo'

 <p class="alert alert-danger">The record could not be edited because no changes were made.
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 </p>';
 
 }
} else { // Already registered.
 echo '<p class="text-center">The Serial_No/Name has ';
 echo 'already been registered.</p>';
 }
 } else { // Display the errors.
 echo '<p class="text-center">The following error(s) occurred:<br />';
 foreach ($errors as $msg) { // Echo each error.
 echo " - $msg<br />\n";
 }
 echo '</p><p>Please try again.</p>';
 } // End of if (empty($errors))section.
 } // End of the conditionals
 
 $q = mysqli_stmt_init($dbcon);
 $query = "SELECT serial_no_name, gender, breed_type, year_of_birth FROM cows WHERE cow_id=?";
 mysqli_stmt_prepare($q, $query);
 // bind $id to SQL Statement
 mysqli_stmt_bind_param($q, 'i', $id);
 // execute query
 mysqli_stmt_execute($q);
 $result = mysqli_stmt_get_result($q);
 $row = mysqli_fetch_array($result, MYSQLI_NUM);
 if (mysqli_num_rows($result) == 1) { 
 
 // Create the form:
?>
<section class="Form my-4 mx-5" style="position:absolute; top:120px;">
<div class="container">
   <h1 class="font-weight-bold" style="text-align:center; font-family:Copper Black;">Edit Details</h1>
<div class="row no-gutters">
<div class="col-lg-5">
<img src="https://upload.wikimedia.org/wikipedia/commons/0/0c/Cow_female_black_white.jpg" class="img-fluid" alt="cow"/>
</div> 
<div class="col-lg-7 px-5">
              
<form action="edit_cow_details.php" method="post"
 name="editform" enctype="multipart/form-data" id="editform">
<div class="form-row">
<div class="col-lg-7">
<label for="serial_no_name">
 Serial_No/Name:</label><br>
 <input type="text" class="form-control" id="serial_no_name" name="serial_no_name"
 placeholder="Serial_No/Name" maxlength="30" required
 value="<?php echo htmlspecialchars($row[0], ENT_QUOTES); ?>" >
</div>
</div>
<div class="form-row">
<div class="col-lg-7">
<label for="gender">
 Gender:</label><br>
 <input type="text" class="form-control" id="gender" name="gender"
 placeholder="Gender" maxlength="40" required
 value="<?php echo htmlspecialchars($row[1], ENT_QUOTES); ?>">
</div>
</div>
<div class="form-row">
<div class="col-lg-7">
<label for="breed_type">
 Breed/Type:</label><br>
 <input type="text" class="form-control" id="breed_type" name="breed_type"
 placeholder="Breed" maxlength="40" required
 value="<?php echo htmlspecialchars($row[2], ENT_QUOTES); ?>">
</div>
</div>
<div class="form-row">
<div class="col-lg-7">
<label for="year_of_birth">Year Of Birth></label><br>
 <input type="text"  class="form-control" id="year_of_birth" name="year_of_birth"
placeholder="Birth Year" maxlength="60" required
 value="<?php echo htmlspecialchars($row[3], ENT_QUOTES); ?>">
</div>
</div>

 <div class="form-row">
<div class="col-lg-7">
<label for="cow_status">Cow Status:</label><br>
<select name="cow_status" placeholder="Cow Status" required id="cow_status" value="<?php if(isset($_POST['cow_status'])) echo $_POST['cow_status'];?>" >
  <option value="available">Available</option>
  <option value="sold">Sold</option>
  <option value="died">Died</option>
</select>
</div>
</div>


<input type="hidden" name="id" value=" <?php echo $id ?>" />
<div class="form-row">
<div class="col-lg-7">
<button type="submit" class="btn1 mt-2 mb-2">Edit</button>
</div>
</div>
</form>
</div>
</div>
</div>
</section>
</div>


<?php
 } else { // The user could not be validated
echo '<p class="text-center">This page has been accessed in error.</p>';
 }
 mysqli_stmt_free_result($q);
 mysqli_close($dbcon);
 }
 catch(Exception $e)
 {
 print "The system is busy. Please try later";
//print "An Exception occurred. Message: " . $e->getMessage();
 }
 catch(Error $e)
 {
 print "The system is currently busy. Please try later";
 //print "An Error occurred. Message: " . $e->getMessage();
 }
?>	
</body>
</html>