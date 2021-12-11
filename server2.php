<?php
// session_start();
// code from codewithhawa
// initializing variables
$fname = "";
$lname = "";
$item    = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'louisville_dorm_mgt_system');

// Input data
if (isset($_POST['save'])) {
    // receive all input values from the form
    $fname = $_REQUEST['fname'];
    $lname = $_REQUEST['lname'];
    $item =  $_REQUEST['item'];

    // form validation: ensure that the form is correctly filled ...
     // by adding (array_push()) corresponding error unto $errors array
        if (empty($fname)) {
        array_push($errors, "First name is required");
         }
        if (empty($lname)) {
      array_push($errors, "Last name is required");
        }
        if (empty($item)) {
             array_push($errors, "Item name is required");
        }


        // first check the database to make sure 
     // a user does not already exist with the same email
        $result = mysqli_query($db, $user_check_query);
        $user_check_query = "SELECT * FROM saint_scholastica WHERE fname='$fname' OR item='$item' LIMIT 1";
      mysqli_fetch_assoc($result);

     if ($user) {
  //user exists
           /*if ($user['firstname'] === $firstname) {
         array_push($errors, "firstname already exists");
           }*/

        if ($user['item'] === $item) {
                array_push($errors, "item already exists"); //Not necessary. delete later
      }


   // Finally, register user if there are no errors in the form
     if (count($errors) == 0) {

    $query = "INSERT INTO `saint_scholastica`(`student_id`, `fname`, `lname`, `item`) VALUES ('student_id','fname','lname','item')";

    mysqli_query($db, $query);
    // $_SESSION['fname'] = $fname;
    // $_SESSION['success'] = "Data Entered";
    header('location: Scholastica.php');
}
?>