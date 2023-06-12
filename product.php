<?php

// Connect
require_once 'config/connect.php';

// Поиск товара по id
$id = $_GET['id'];
$product = mysqli_query($connect, "SELECT * FROM `products` WHERE `id` = '$id'");
$product = mysqli_fetch_assoc($product);

// Получаем комментарии
$comments = mysqli_query($connect, "SELECT * FROM `comments` WHERE `product_id` = '$id'");
$comments = mysqli_fetch_all($comments, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Просмотр товара</title>
</head>
<body>
    <div class="page">
        <div class="row">
            <h2>Название товара</h2>
            <div class="value"><?= $product['title'] ?></div>
        </div>
        <div class="row">
            <h2>Цена товара</h2>
            <div class="value"><?= $product['price'] ?> rub</div>
        </div>
        <div class="row">
            <h2>Описание товара</h2>
            <div class="value"><?= $product['description'] ?></div>
        </div>  
        <div class="comments">
            <h2>Комментарии</h2>
            <ul>
                <?php
                
                if(count($comments) == 0) {
                    echo '<li class="comm">Здесь пока нет комментариев</li>';
                } else {
                    foreach($comments as $comment): echo
                    <<<ITEM
                    <li> 
                        <div class="comm"> - $comment[comment]</div>
                        <a href="vendor/comments/delete.php?comment_id=$comment[id]&product_id=$product[id]">Удалить</a>
                    </li>
                    ITEM;
                    endforeach;
                }

                ?>
            </ul>
            <form action="vendor/comments/create.php" method="POST">
                <input type="hidden" name="id" value="<?= $product['id'] ?>">
                <input type="text" name="comment" placeholder="Новый комментарий...">
                <button type="submit">Добавить</button>
            </form>
        </div>
    </div>
</body>
</html>

<style>
    body {
        background-color: darkcyan;
        font-size: 25px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    a {
        text-decoration: none;
        color: black;
        font-size: 18px;
        padding: 2px 4px;
        border: 1px solid black;
        border-radius: 2px;
        height: fit-content;
    }

    li {
        display: flex;
        justify-content: space-between;
        width: 100%;
    }

    ul {
        height: 294px;
        overflow-y: scroll;
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    ul::-webkit-scrollbar {
        display: none;
    }

    .comm {
        width: 85%;
        word-wrap: break-word;
    }

    h2 {
        margin: 0;
    }

    .page {
        width: 900px;
        margin-top: 100px;
    }

    .row {
         margin-bottom: 30px;
    }

    .value {
        margin-top: 5px;
    }

    .comments {
        margin-top: 60px;
    }

    ul {
        list-style-type: none;
        border: 1px solid black;
        padding: 10px 15px;
    }

    li:not(:last-child) {
        margin-bottom: 10px;
    }

    input {
        background-color: inherit;
        border: 1px solid black;
        color: black;
        font-size: 18px;
        padding: 5px;
        width: 75%;
    }

    input::placeholder {
        color: black;
        opacity: 0.5;
    }

    form {
        display: flex;
        justify-content: space-between;
    }

    button {
        background-color: inherit;
        border: 1px solid black;
        border-radius: 2px;
        font-size: 16px;
    }

    button:hover {
        cursor: pointer;
        background-color: green;
    }

</style>