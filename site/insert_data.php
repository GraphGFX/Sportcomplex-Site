<?php

// Параметри для підключення до бази даних
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";

// Підключення до бази даних
$conn = new mysqli($servername, $username, $password, $dbname);

// Перевірка підключення
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Отримання значень з форми
$fitness_amount = $_POST['price_0'];
$fitness_attand = $_POST['price_range_0'] ?? 0;
$pool_amount = $_POST['price_1'];
$pool_attand = $_POST['price_range_1'] ?? 0;
$yoga_amount = $_POST['price_2'];
$yoga_attand = $_POST['price_range_2'] ?? 0;
$gym_amount = $_POST['price_3'];
$gym_attand = $_POST['price_range_3'] ?? 0;
$box_amount = $_POST['price_4'];
$box_attand = $_POST['price_range_4'] ?? 0;
$pilates_amount = $_POST['price_5'];
$pilates_attand = $_POST['price_range_5'] ?? 0;

// Запит до бази даних на додавання даних до таблиці
$sql = "INSERT INTO sport_data ( fitness_amount, fitness_attand, pool_amount, pool_attand, yoga_amount, yoga_attand, gym_amount, gym_attand, box_amount, box_attand, pilates_amount, pilates_attand) 
VALUES ('$fitness_amount', '$fitness_attand', '$pool_amount', '$pool_attand', '$yoga_amount', '$yoga_attand', '$gym_amount', '$gym_attand', '$box_amount', '$box_attand', '$pilates_amount', '$pilates_attand')";


// Закриття підключення до бази даних
$conn->close();

?>