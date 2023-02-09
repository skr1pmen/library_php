<?php
require 'database.php';

$link = get_connect();

$name = $_POST['name'];
$surname = $_POST['surname'];
$patronymic = $_POST['patronymic'];
$login = $_POST['login'];
$password =  password_hash($_POST['password'], PASSWORD_DEFAULT);
$pass = $_POST['pass'];

$series =  substr($pass, 0, 4);
//var_dump($series);

$number =  substr($pass, 4);
//var_dump($number);

$login = mysqli_query($link,"SELECT * FROM `users` where login = '{$login}'");
if ($login->num_rows == 0){
    $result = get_connect()->query("INSERT INTO users (name, surname, patronymic, login, password, pass_series, pass_number)
    VALUES ('{$name}', '{$surname}', '{$patronymic}', '{$login}', '{$password}', '{$series}', '{$number}')");
} else{
    header('location: ../pages/Registration.php');
    echo 'Пошёл нафиг!';
}
