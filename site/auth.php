<?php
	$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
	$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);


	
	$mysql = new mysqli('localhost',
						'root',
						'',
						'register') 
	or die("unable to connect");

	$result = $mysql->query("SELECT * FROM users WHERE login = '$login' AND pass = '$pass'");
	
	$user = $result->fetch_assoc();


	if($user == NULL) {
		echo "user not found";
		exit();
	} 
	
	setcookie('user', $user['name'], time() + 3600, "/");


	$mysql ->close();

	header('Location:/site/account.php');
?>