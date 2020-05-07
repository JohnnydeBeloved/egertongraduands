<?php 
include 'session_staff.php';
include 'connect.php';
// $status = $_POST['status'];
$id = $_POST['id'];
$user_id = $_SESSION['id'];

if($user_id == 1){
	$query = $conn->prepare("UPDATE clearance SET is_faculty_approval = 1 WHERE id = ?"); 	
	$query->execute(array($id));
	header('location:production/staff.php');	
}
elseif ($user_id == 2) {
	$query = $conn->prepare("UPDATE clearance SET is_library_approval = 1 WHERE id = ?"); 	
	$query->execute(array($id));
	header('location:production/staff.php');
}
elseif ($user_id == 3) {
	$query = $conn->prepare("UPDATE clearance SET is_halls_approval = 1 WHERE id = ?"); 	
	$query->execute(array($id));
	header('location:production/staff.php');
}
elseif ($user_id == 4) {
	$query = $conn->prepare("UPDATE clearance SET is_catering_approval = 1 WHERE id = ?"); 	
	$query->execute(array($id));
	header('location:production/staff.php');
}
elseif ($user_id == 5) {
	$query = $conn->prepare("UPDATE clearance SET is_security_approval = 1 WHERE id = ?"); 	
	$query->execute(array($id));
	header('location:production/staff.php');
}
elseif ($user_id == 6) {
	$query = $conn->prepare("UPDATE clearance SET is_games_approval = 1 WHERE id = ?"); 	
	$query->execute(array($id));
	header('location:production/staff.php');
}
elseif ($user_id == 7) {
	$query = $conn->prepare("UPDATE clearance SET is_medical_approval = 1 WHERE id = ?"); 	
	$query->execute(array($id));
	header('location:production/staff.php');
}
elseif ($user_id == 8) {
	$query = $conn->prepare("UPDATE clearance SET is_dean_approval = 1 WHERE id = ?"); 	
	$query->execute(array($id));
	header('location:production/staff.php');
}
elseif ($user_id == 9) {
	$query = $conn->prepare("UPDATE clearance SET is_finance_approval = 1 WHERE id = ?"); 	
	$query->execute(array($id));
	header('location:production/staff.php');

	$sql = $conn->prepare("INSERT INTO cleared_graduand(id) VALUES (?) ");
	// $query1 = $conn->prepare($sql);
	$sql->execute(array($id));
	header('location:production/staff.php');
}
else{
	$query = $conn->prepare("UPDATE clearance SET is_vp_admin_approval = 1 WHERE id = ?"); 	
	$query->execute(array($id));
	header('location:production/staff.php');
}
?>