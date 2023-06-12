<?php
try {
    $connect = mysqli_connect('127.0.0.1', 'root', '', 'crud');
} catch (mysqli_sql_exception $exception) {
    error_log($exception->getMessage());
    die("You can't connect to database!");
}