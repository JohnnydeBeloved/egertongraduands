<?php 
include 'session_staff.php';
include 'connect.php';
// $status = $_POST['status'];
$a = $_POST['haydi'];
$user_id = $_SESSION['id'];

	$query = $conn->prepare("UPDATE requirementstatus SET status = 1 WHERE id = $a AND staff_id = $user_id"); 	
	$query->execute(array($a,$user_id));
	header('location:production/staff.php');	
?>