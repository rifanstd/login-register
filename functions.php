<?php 

// connection to db
$conn = mysqli_connect("localhost", "root", "", "login_register");


// Function register
function register($data){
	global $conn;

	$username = stripslashes($data["username"]);
	$password = $data["password"];
	$confirm_password = $data["confirm-password"];

	// cek if there is exist username in database
	$cekUsernameExist = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
	if (mysqli_fetch_row($cekUsernameExist) != NULL) {
		return 0;
	}

	// cek if password less than 8 characters
	if (strlen($password) < 8) {
		return -1;
	}

	// cek if password != confirm_passowrd
	if ($password !== $confirm_password) {
		return -2;
	}

	// encryption password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// insert to database
	mysqli_query($conn, "INSERT INTO users VALUES('', '$username', '$password')");

	return mysqli_affected_rows($conn);
}

// Function Login
function login($data){
	global $conn;

	$username = $data['username'];
	$password = $data['password'];

	$cekUsernameExist = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

	// verify username
	if (($row = mysqli_fetch_assoc($cekUsernameExist))) {

		//verify password
		if (password_verify($password, $row["password"])) {
			return 1;
		}
		else {
			return -1;
		}
	}
	else {
		return 0;
	}
}


?>