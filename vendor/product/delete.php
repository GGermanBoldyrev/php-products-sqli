<?php

// Connect
require_once '../../config/connect.php';

$id = $_GET['id'];

try {
    mysqli_query($connect, "DELETE FROM `products` WHERE `id` = '$id'");
} catch(Exception $e) {
    echo 'Возникла ошибка при удалении товара';
}

header("Location: /");
exit();