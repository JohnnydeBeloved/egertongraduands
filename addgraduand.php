<?php
include 'connect.php';

if (isset($_POST['add'])){
	$graduandId = $_POST['graduandId'];
	$firstname = $_POST['firstname'];
	$middlename = $_POST['middlename'];
	$lastname = $_POST['lastname'];
	$contactnumber = $_POST['contactnumber'];
	$email = $_POST['email'];
	$department = $_POST['department'];
	$campus = $_POST['campus'];
	$course = $_POST['course'];

	$add = $conn->prepare("INSERT INTO graduand (graduand_id, graduand_Fname, graduand_Mname, graduand_Lname, Contact_num, Email, Department, Campus, course_program)
		VALUES (?,?,?,?,?,?,?,?,?) ");
	$add->execute(array($graduandId,$firstname,$middlename,$lastname,$contactnumber,$email,$department,$campus,$course));
	
	$a = $conn->lastInsertId();
	$add1 = $conn->prepare("INSERT INTO clearance (id) VALUES (?)");
	$add1->execute(array($a));
	$add2 = $conn->prepare("INSERT INTO pds_personal_information (id) VALUES (?)");
	$add2->execute(array($a));
}
?>