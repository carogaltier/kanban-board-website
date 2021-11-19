<?php 
if(isset($_SESSION['user'])) {
	header('Location: content.php');
	die();
} else {
	require 'views/main.view.php';
}

?>