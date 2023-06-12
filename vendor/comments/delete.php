<?php

require_once "../../config/connect.php";

$comment_id = $_GET['comment_id'];
$product_id = $_GET['product_id'];

try {
    mysqli_query($connect, "DELETE FROM `comments` WHERE `id` = '$comment_id'");
} catch(Exception $e) {
    echo 'Возникла ошибка при удалении товара';
}

header("Location: /product.php?id=$product_id");
exit();