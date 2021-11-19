<?php session_start();

if (isset($_SESSION['user'])) {
	header('Location: content.php');
	die();
}

// Checking if the form has been filled it up.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$user_form = filter_var(htmlspecialchars($_POST['user']), FILTER_SANITIZE_STRING);
	$password_form = filter_var(htmlspecialchars($_POST['password']), FILTER_SANITIZE_STRING);
	$password_form = hash('sha512', $password_form);
	$errors = '';

	// ----------------------- DATABASE CONNECTION ------------------------------------
	include 'db/functions.php';

	$database = new Database();
    $connection = $database->connection();

	
	$statement = $connection->prepare('SELECT * FROM users WHERE user =? AND password =?');
	$statement->execute(array($user_form, $password_form));
	$result = $statement->rowCount();
	if ($result == 1) {
		while ($id = $statement->fetch(PDO::FETCH_ASSOC)) {
			$id_user = $id['id_user'];
			$_SESSION['id_user'] = $id_user;
			$_SESSION['user'] = $user_form;
		}

		header('Location: index.php');
	} else {
		$errors = '<li>The username or password is incorrect</li>';
	}
}

require 'views/login.view.php';

?>

