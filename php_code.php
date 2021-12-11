<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'louisville_dorm_mgt_system`');

// initialize variables
$fname = "";
$lname = "";
$item = "";
$update = false;

if (isset($_POST['save'])) {
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$item = $_POST['item'];

	mysqli_query($db, "INSERT INTO `saint_scholastica` (`fname`, `lname`, `item`) VALUES ('$fname','$lname', '$item')");
	$_SESSION['message'] = "Address saved";
	header('location: Scholastica.php');
}
