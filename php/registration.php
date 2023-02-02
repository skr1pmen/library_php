<?php
$link = new mysqli('localhost', 'root', '', 'library_228');
if (!$link) {
    die('Ошибка соединения: ' . mysqli_error());
}
echo 'Успешно соединились';

$name = $_POST['name'];
$surname = $_POST['surname'];
$patronymic = $_POST['patronymic'];
$login = $_POST['login'];
$password = $_POST['password'];
$pass = $_POST['pass'];

$series =  substr($pass, 0, 4);
var_dump($series);

$number =  substr($pass, 4);
var_dump($number);

$result = $link->query("INSERT INTO users (name, surname, patronymic, login, password, pass_series, pass_number)
    VALUES ('{$name}', '{$surname}', '{$patronymic}', '{$login}', '{$password}', '{$series}', '{$number}')");