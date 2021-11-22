<?php session_start();

if (isset($_SESSION['user'])) {
	include 'db/functions.php';
	$database = new Database();
	$connection = $database->connection();
} else {
	header('Location: main.php');
	die();
}

$today = date("Y-m-d");
$today_start =date("Y-m-d")." 00:00:00";
$today_end =date("Y-m-d")." 23:59:59";
// -------------------- SHOWING PROJECTS THAT START TODAY-------------------------
$projects_start = $connection->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM projects WHERE id_user = ? AND start_date= ? ORDER BY id_project DESC") ;			
$projects_start->execute(array($_SESSION['id_user'], $today));
$projects_start = $projects_start->fetchAll();

// -------------------- SHOWING PROJECTS THAT END TODAY-------------------------
$projects_end = $connection->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM projects WHERE id_user = ? AND end_date= ? ORDER BY id_project DESC") ;			
$projects_end->execute(array($_SESSION['id_user'], $today));
$projects_end = $projects_end->fetchAll();

// -------------------- SHOWING EVENTS THAT START  TODAY-------------------------
$events_start = $connection->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM calendar WHERE id_user = ? AND (start_date BETWEEN ? AND ?) ORDER BY id_event DESC") ;			
$events_start->execute(array($_SESSION['id_user'], $today_start, $today_end));
$events_start = $events_start->fetchAll();

// -------------------- SHOWING EVENTS THAT  END TODAY-------------------------
$events_end = $connection->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM calendar WHERE id_user = ? AND (end_date BETWEEN ? AND ?) ORDER BY id_event DESC") ;			
$events_end->execute(array($_SESSION['id_user'], $today_start, $today_end));
$events_end = $events_end->fetchAll();

// -------------------- SHOWING TASK WHICH DEADLINE IS TODAY -------------------------
$tasks = $connection->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM tasks WHERE id_user = ? AND deadline= ? ORDER BY id_task DESC") ;			
$tasks->execute(array($_SESSION['id_user'], $today));
$tasks = $tasks->fetchAll();


require 'views/today.view.php';


?>