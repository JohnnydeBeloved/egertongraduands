<?php 
include('connect.php');
session_start();

if (!isset($_SESSION['id']) || ($_SESSION['id'] == '')){ ?>
	<script>
		window.location = 'index.php';
	</script>
	<?php
}

$session_id = $_SESSION['id'];

$sql = "SELECT * FROM staff WHERE staff_id = $session_id ";
$query = $conn->prepare($sql);
$query->execute(array($session_id));
$row = $query->fetch();

$name_staff = $row['staff_name'];
?>