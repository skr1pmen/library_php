<?php
require 'database.php';

$login = $_POST['login'];
$password = $_POST['password'];

$link = get_connect();
$login = mysqli_real_escape_string($link, $login);

$login = mysqli_query($link,"SELECT * FROM `users` where login = '{$login}'");
$login = mysqli_fetch_all($login, MYSQLI_ASSOC);

if (!empty($login)){
    if (password_verify($password, $login[0]['password'])){
        var_dump('true');
    };
}
get_close($link);
