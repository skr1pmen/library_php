<?php
const HOST = 'localhost';
const USERNAME = 'root';
const PASSWORD = 'root';
const DATABASE = 'library-php';

function get_connect(){
    $link = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);

    return $link;
}

function get_close($link){
    return mysqli_close($link);
}


