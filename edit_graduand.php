<?php 
include 'connect.php';
$graduandId = $_POST['graduandId'];
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];
$contactnumber = $_POST['contactnumber'];
$email = $_POST['email'];
$department = $_POST['department'];
$campus = $_POST['campus'];
$id = $_POST['id'];

$query = $conn->prepare("UPDATE graduand SET graduand_id = ?, graduand_Fname = ?, graduand_Mname = ?, graduand_Lname = ?, Contact_num = ?, Email = ?, Department = ?, Campus = ? WHERE id = ?"); 	
$query->execute(array($graduandId,$firstname,$middlename,$lastname,$contactnumber,$email,$department,$campus,$id));
header('location:production/admin.php');
?>