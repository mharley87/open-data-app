<?php

require_once '../includes/db.php';
require_once '../includes/users.php';


if (user_is_signed_in()) {
	header('Location: /admin/index.php');
	exit;
}

$errors = array();
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = true;	
	}
	
	if (!filter_var($password)) {
		$errors['password'] = true;	
	}
	
	if (empty($errors)) {
		$user = user_get($db, $email);
		if(password_match($password,$user['password']));
		user_sign_in($user['id']);
		header('Location: /admin/index.php');
		exit;
	}else{
		$errrors['password-no-match'] = true;
	if (!empty($user)) {
	} else {
		$errors['user-non-existent'] = true;
		}
	}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Sign-in</title>
</head>

<body>

<form method="post" action="sign-in.php">
<div>
	<label for="email">E-mail Address</label>
    <input type="email" id="email" name="email" required>
</div>

<div>
	<label for="password">Password</label>
    <input type="password" id="password" name="password" required>
</div>
<button type="submit">Sign In</button>

</body>
</html>