<?php session_start();

if (isset($_SESSION['user'])) {
} else {
	header('Location: ../../login.php');
	die();
}

require_once('../../db/functions.php');
	$database = new Database();
	$db = $database->connection();

	if (isset($_POST['Event'][0]) && isset($_POST['Event'][1]) && isset($_POST['Event'][2])){
		
		$id_event = $_POST['Event'][0];
		$start_date = $_POST['Event'][1];
		$end_date = $_POST['Event'][2];

		$start_date= date('Y/m/d H:i:s', strtotime($start_date));
		$end_date= date('Y/m/d H:i:s', strtotime($end_date));

		
		$sql = "UPDATE calendar SET  start_date = '$start_date', end_date = '$end_date' WHERE id_event = '$id_event' ";
		
		$query = $db->prepare( $sql );
		if ($query == false) {
			print_r($db->errorInfo());
			die ('There was a problem while loading');
		}

		$sth = $query->execute();
		if ($sth == false) {
			print_r($query->errorInfo());
			die ('There was a problem while running the query');
		}else{
			die ('OK');
		}

	}
	//header('Location: '.$_SERVER['HTTP_REFERER']);
?>
