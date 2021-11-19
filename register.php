<?php session_start();

if (isset($_SESSION['user'])) {
	header('Location: content.php');
	die();
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	// Validation
	$user_form = filter_var(htmlspecialchars($_POST['user']), FILTER_SANITIZE_STRING);
	$password_form = filter_var(htmlspecialchars($_POST['password']), FILTER_SANITIZE_STRING);
	$password2_form = filter_var(htmlspecialchars($_POST['password2']), FILTER_SANITIZE_STRING);
	$errors = '';

	// Checking for empty spaces.
	if (empty($user_form) or empty($password_form) or empty($password2_form)) {
		$errors = '<li>Please fill in all the required fields.</li>';
	} else {

		include 'db/functions.php';
		$database = new Database();
		$connection = $database->connection();

		// Cheking if the username already exists.
		$statement = $connection->prepare('SELECT * FROM users WHERE user = :user LIMIT 1');
		$statement->execute(array(
			':user' => $user_form));	
		$result = $statement->fetch();
	
		// In case there wasn't any result the fetch function returns false. 
		// Any other result other than false means that the user already exists.
		if ($result != false) {
			$errors .= '<li>Sorry, the username already exists.</li>';
		}

		// Hashing the password
		$password_form = hash('sha512', $password_form);
		$password2_form = hash('sha512', $password2_form);

		// Checking if both passwords match.
		if ($password_form != $password2_form) {
			$errors .= '<li>The password confirmation does not match.</li>';
		}
	}

	// Checking if there is any err, otherwise we create a user and redirect them to login.php
	if ($errors == '') {
		$statement = $connection->prepare('INSERT INTO users (id_user, user, password) VALUES (null, :user, :password)');
		$statement->execute(array(
					':user' => $user_form,
				':password' => $password_form
			));
		header('Location: login.php');
	}

}

require 'views/register.view.php';
?>