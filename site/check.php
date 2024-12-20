<?php
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

	if(mb_strlen($login)< 2 || mb_strlen($login) > 28){
		echo"Invalid login";
		exit();
	}else if(mb_strlen($name)< 2 || mb_strlen($name) > 28){
		echo"Invalid name";
		exit();
	}else if(mb_strlen($pass)< 3 || mb_strlen($name) > 16){
		echo"Invalid pass";
		exit();
	}



	$mysql = new mysqli('localhost','root','','register') or die("unable to connect");

	$result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `name` = '$name' AND pass = '$pass'");
	$user = $result->fetch_assoc();
	if($user > 0 ){
		echo "Login is taken";
		exit();
	}


	$mysql ->query("INSERT INTO `users` (`login`, `name`, `pass`) VALUES('$login', '$name', '$pass')");


	$mysql ->close();

	header('Location:/site/form.php');
?>