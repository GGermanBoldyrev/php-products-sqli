<?php

// Подключение к бд
require_once '../../config/connect.php';

$product_id = $_POST['id'];
$comment = $_POST['comment'];

try {
    mysqli_query($connect, "INSERT INTO `comments`(`id`, `product_id`, `comment`) 
                            VALUES (NULL, '$product_id', '$comment')");
} catch(mysqli_sql_exception $e) {
    echo 'Возникла ошибка при добавлении комментария';
}

header("Location: /product.php?id=$product_id");
exit();