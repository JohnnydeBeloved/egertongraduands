		<?php
		include 'connect.php';
		
		if (isset($_POST['read'])){
			$status = $_POST['status'];

			$query = $conn->prepare("UPDATE message SET message_status = 1, WHERE id = ? AND staff_id = ?"); 	
			$query->execute(array($status));

		}
		?>