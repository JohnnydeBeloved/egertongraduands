<?php
include'connect.php';
include'session_staff.php';


		$id = $_POST['id'];
		$message = $_POST['message'];
		$staff_id = $_SESSION['id'];
		$sql = "INSERT INTO message(staff_id,id,message_content) VALUES(?,?,?)";
		$query = $conn->prepare($sql);
		$query->execute(array($staff_id,$id,$message));
		$count = $query->rowCount();

		if ($count > 0){
			echo "<script type='text/javascript'>alert('Message Sent');</script>";
			echo "<script>document.location='production/staff.php'</script>";
		}else{
			echo "<script type='text/javascript'>alert('Error creating alert!');</script>";
		}

	?>