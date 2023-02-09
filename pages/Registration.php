<?php
require '../php/database.php';

$link = get_connect();

$name = $_POST['name'];
$surname = $_POST['surname'];
$patronymic = $_POST['patronymic'];
$login = $_POST['login'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$pass = $_POST['pass'];

$series = substr($pass, 0, 4);
//var_dump($series);

$number = substr($pass, 4);
//var_dump($number);
$error = false;
$set_login = mysqli_query($link, "SELECT * FROM `users` where login = '{$login}'");
if ($set_login->num_rows == 0) {
    $result = get_connect()->query("INSERT INTO users (name, surname, patronymic, login, password, pass_series, pass_number)
VALUES ('{$name}', '{$surname}', '{$patronymic}', '{$login}', '{$password}', '{$series}', '{$number}')");
} else {
//    header('location: ../pages/Registration.html');
    $error = true;
}
?>

<!DOCTYPE html>
<html lang="ru-ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация | Library</title>
    <link rel="icon" type="image/x-icon" href="../images/reading-book.png">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/forms.css">
</head>
<body>
<h1>Регистрация</h1>
<form method="post" action="../php/registration.php">
    <label for="name">Имя:</label><input id="name" type="text" name="name" required placeholder="Введите имя">
    <label for="surname">Фамилия:</label><input id="surname" type="text" name="surname" required placeholder="Введите фамилию">
    <label for="patronymic">Отчество:</label><input id="patronymic" type="text" name="patronymic" placeholder="Введите отчество">
    <label for="login">Логин:</label><input id="login" type="text" name="login" required placeholder="Введите логин">
    <?php if($error): ?><span class="err"">Логин уже занят, придумай другой!</span><?php endif;?>
    <label for="password">Пароль:</label><input id="password" type="password" name="password" required placeholder="Введите пароль">
    <label for="series">Паспортные данные:</label><input id="series" type="text" name="pass" required placeholder="Введите серию паспорта">
    <input class="btn" type="submit" value="Зарегистрироваться">
</form>
<span>Уже есть аккаунт,<a class="little_btn" href="./LogIn.html"> войти</a>?</span>
<a class="little_btn" href="../index.html">БлRть, нахуй я сюда пришёл</a>

</body>
</html>