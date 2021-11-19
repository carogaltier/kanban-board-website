<?php session_start();

if (isset($_SESSION['user'])) {
} else {
	header('Location: ../../login.php');
	die();
}

	require_once('../../db/functions.php');
	$database = new Database();
	$db = $database->connection();

	if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['start_date']) && isset($_POST['end_date']) && isset($_POST['colour'])){
		
		$title = $_POST['title'];
		$description = $_POST['description'];
		$start_date = $_POST['start_date'];
		$end_date = $_POST['end_date'];
		$colour = $_POST['colour'];
		$id_user = $_SESSION['id_user'];

		$start_date= date('Y/m/d H:i:s', strtotime($start_date));
		$end_date= date('Y/m/d H:i:s', strtotime($end_date));

		$sql = "INSERT INTO calendar(id_user, title, description, start_date, end_date, colour) 
		values ('$id_user', '$title', '$description', '$start_date', '$end_date', '$colour')";
		
		echo $sql;
		
		$query = $db->prepare( $sql );
		if ($query == false) {
			print_r($db->errorInfo());
			die ('There was a problem while loading');
		}
		
		$sth = $query->execute();
		if ($sth == false) {
			print_r($query->errorInfo());
			die ('There was a problem while running the query');
		}

	}
	header('Location: '.$_SERVER['HTTP_REFERER']);	
?>