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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   
    <title>Edit User</title>
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
<div class="container" style="margin-top:130px;">
<?php
 try
 {
 // After clicking the Edit link in the members_record.php page. 
// This code is executed 
 // The code looks for a valid user ID, either through GET or POST:
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
 // Look for the first name: #2
 $first_name =
 filter_var( $_POST['first_name'], FILTER_SANITIZE_STRING);
 if (empty($first_name)) {
 $errors[] = 'You forgot to enter your first name.';
 }
 // Look for the last name:
// $last_name = filter_var( $_POST['last_name'], FILTER_SANITIZE_STRING);
// if (empty($last_name)) {
// $errors[] = 'You forgot to enter your last name.';
// }

  // look for gender
 //$gender = filter_var( $_POST['gender'], FILTER_SANITIZE_STRING);
 //if (empty($gender)) {
 //$errors[] = 'You forgot to enter Gender';
 //}
 // Look for the email address:
 $email = filter_var( $_POST['email'], FILTER_SANITIZE_EMAIL);
 if ((empty($email)) || (!filter_var($email, FILTER_VALIDATE_EMAIL))) {
 $errors[] = 'You forgot to enter your email address';
 $errors[] = ' or the e-mail format is incorrect.';
 }
// look for relationship
// $relationship = filter_var( $_POST['relationship'], FILTER_SANITIZE_STRING);
// if (empty($relationship)) {
// $errors[] = 'You forgot to enter relationship.';
// }

$user_level = filter_var( $_POST['user_level'], FILTER_SANITIZE_STRING);
if (empty($errors)) { // If everything's OK. #3
 $q = mysqli_stmt_init($dbcon);
 $query = 'SELECT member_id FROM family_members WHERE email=? AND member_id != ?';
 mysqli_stmt_prepare($q, $query);
 // bind $id to SQL Statement
 mysqli_stmt_bind_param($q, 'si', $email, $id);
 // execute query
 mysqli_stmt_execute($q);
 $result = mysqli_stmt_get_result($q);
 if (mysqli_num_rows($result) == 0) {
 // e-mail does not exist in another record #4
 $query = 'UPDATE family_members SET first_name=?, email=?,  user_level=? WHERE member_id=? LIMIT 1';
 $q = mysqli_stmt_init($dbcon);
 mysqli_stmt_prepare($q, $query);
 // bind values to SQL Statement
mysqli_stmt_bind_param($q, 'sssi', $first_name, $email,  $user_level, $id);
 // execute query
 mysqli_stmt_execute($q);
 if (mysqli_stmt_affected_rows($q) == 1) { // Update OK
 // Echo a message if the edit was satisfactory:
 echo '<h3 class="text-center">The user has been edited.</h3>';
 } else { // Echo a message if the query failed.
 echo'

 <p class="alert alert-danger">The user could not be edited because no changes were made.
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 </p>';
 


// echo ' We apologize for any inconvenience.</p>'; // Public message.
// echo '<p>' . mysqli_error($dbcon) . '<br />Query: ' . $q . '</p>';
 // Debugging message.
 // Message above is only for debug and should not display SQL in live //mode
 }
} else { // Already registered.
 echo '<p class="text-center">The email address has ';
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
 // Select the user's information to display in textboxes: #5
 $q = mysqli_stmt_init($dbcon);
 $query = "SELECT first_name, email, user_level FROM family_members WHERE member_id=?";
 mysqli_stmt_prepare($q, $query);
 // bind $id to SQL Statement
 mysqli_stmt_bind_param($q, 'i', $id);
 // execute query
 mysqli_stmt_execute($q);
 $result = mysqli_stmt_get_result($q);
 $row = mysqli_fetch_array($result, MYSQLI_NUM);
 if (mysqli_num_rows($result) == 1) { // Valid user ID, display the form.
 // Get the user's information:
 // Create the form:
?>

<section class="Form my-4 mx-5" style="margin-top:80px;">
<div class="container">
<div class="row no-gutters">
<div class="col-lg-5">
<img src="https://img.freepik.com/free-vector/bottle-glass-milk_1284-14094.jpg?w=2000" class="img-fluid" alt="cow"/>
</div> 
<div class="col-lg-7 px-5">
<h1 class="font-weight-bold ">Edit User.</h1>
<form action="edit_family_member.php" enctype="multipart/form-data" method="post"
 name="editform" id="editform">
 <div class="form-row">
<div class="col-lg-7">
<label for="first_name">
 Full Name:</label><br>
 <input type="text" class="form-control" id="first_name" name="first_name"
 placeholder="First Name" maxlength="30" required
 value="<?php echo htmlspecialchars($row[0], ENT_QUOTES); ?>" ></p>
</div>
</div>

<!-- <div class="form-row">
<div class="col-lg-7">
<label for="last_name">
 Last Name:</label><br>
 <input type="text" class="form-control" id="last_name" name="last_name"
 placeholder="Last Name" maxlength="40" required
 value="<?php// echo htmlspecialchars($row[1], ENT_QUOTES); ?>">
</div>
</div> -->

<!-- <div class="form-row">
<div class="col-lg-7">
<label for="gender">
 Gender:</label><br>
 <input type="text" class="form-control" id="gender" name="gender"
 placeholder="Gender" maxlength="40" required
 value="<?php// echo htmlspecialchars($row[2], ENT_QUOTES); ?>">
</div>
</div> -->

<div class="form-row">
<div class="col-lg-7">
<label for="email">E-mail:</label><br>
 <input type="email" class="form-control" id="email" name="email"
placeholder="E-mail" maxlength="60" required
 value="<?php echo htmlspecialchars($row[1], ENT_QUOTES); ?>">
</div>
</div>
<!-- <div class="form-row">
<div class="col-lg-7">
<label for="relationship">
 Relationship:</label><br>
 <input type="text" class="form-control" id="relationship" name="relationship"
 placeholder="Relationship" maxlength="40" required
 value="<?php //echo htmlspecialchars($row[4], ENT_QUOTES); ?>">
 </div>
</div> -->

<!-- <div class="form-row">
<div class="col-lg-7">
 <label for="profile_photo">
 Profile:</label><br>
 <input type="file" class="form-control" id="profile_photo" name="profile_photo"
 placeholder="Profile" maxlength="200" 
 value="<?php //echo htmlspecialchars($row[5], ENT_QUOTES); ?>">
 </div>
</div> -->


<div class="form-row">
<div class="col-lg-7">
<label for="user_level">
 User Level:</label><br>
 <input type="number" min= "0" max="3" class="form-control" id="user_level" name="user_level"
 placeholder="User_level" maxlength="40" required
 value="<?php echo htmlspecialchars($row[2], ENT_QUOTES); ?>">
 <span id='message'> Level_0= Waiting Approval. Level_1= Authorized User. Level_2 = Veterinary Level_3= Admin</span>
 </div>
</div>

<input type="hidden" name="id" value=" <?php echo $id ?>" />
<div class="form-row">
<div class="col-lg-7">
<button type="submit" class="btn1 mt-4 mb-2">Edit</button>
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
// print "The system is busy. Please try later";
// print "An Exception occurred. Message: " . $e->getMessage();
 }
 catch(Error $e)
 {
print "The system is currently busy. Please try later";
//print "An Error occurred. Message: " . $e->getMessage();
 }
?>	

</body>
</html>