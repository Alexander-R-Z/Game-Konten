<?php
session_start();

// Set variables for the database connection
$db_host = "localhost";
$db_username = "username";
$db_password = "password";
$db_name = "database_name";

// Connect to the database
$db_connection = mysqli_connect($db_host, $db_username, $db_password, $db_name);

// Check if the form has been submitted
if (isset($_POST['username']) && isset($_POST['password'])) {
  // Escape special characters to prevent SQL injection attacks
  $username = mysqli_real_escape_string($db_connection, $_POST['username']);
  $password = mysqli_real_escape_string($db_connection, $_POST['password']);

  // Query the database to check if the user exists
  $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
  $result = mysqli_query($db_connection, $query);

  // If the user exists, set a session variable and redirect to the homepage
  if (mysqli_num_rows($result) == 1) {
    $_SESSION['logged_in'] = true;
    header('Location: index.php');
  }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<body>
	<h1>Login</h1>
	<form action="login.php" method="POST">
		<label for="username">Username:</label><br>
		<input type="text" id="username" name="username"><br>
		<label for="password">Password:</label><br>
		<input type="password" id="password" name="password"><br><br>
		<input type="submit" value="Submit">
	</form>
</body>
</html>
