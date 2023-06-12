<?php

require_once '../../config/connect.php';

$id = $_POST['id'];
$title = $_POST['title'];
$price = $_POST['price'];
$description = $_POST['description'];

try {
    mysqli_query($connect, "UPDATE `products` 
                            SET `title` = '$title', `price` = '$price', `description` = '$description'
                            WHERE `id` = '$id'");
} catch(mysqli_sql_exception $e) {
    echo 'Возникла ошибка при изменении товара';
}

header("Location: /");
exit();