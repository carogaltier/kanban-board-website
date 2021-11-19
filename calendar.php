<?php session_start();

if (isset($_SESSION['user'])) {
} else {
	header('Location: main.php');
	die();
}

$id_user = $_SESSION['id_user'];

require_once('db/functions.php');

	$database = new Database();
	$connection = $database->connection();

	$statement = $connection->prepare("SELECT id_event, title, description, start_date, end_date, colour FROM calendar Where id_user = ? ");
	$statement->execute(array($id_user));
	$events = $statement->fetchAll();

require_once 'views/calendar.view.php';

?>
