<?php 

$id = $_GET['sess_id'];

include '../connect.php';


$sql = "SELECT * FROM pds_personal_information WHERE id = ? " ;
		$query = $conn->prepare($sql);
		$query->execute(array($id));
		$fetch = $query->fetchAll();

		foreach ($fetch as $key => $value) {
			$data['cn'] =  $value['child_name'];
			$data['cbd'] = $value['child_birthday'];
		}

echo json_encode($data);

?>