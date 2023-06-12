<?php

// Connect
require_once 'config/connect.php';

// Поиск товара по id
$id = $_GET['id'];
$product = mysqli_query($connect, "SELECT * FROM `products` WHERE `id` = '$id'");
$product = mysqli_fetch_assoc($product);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Обновить товар</title>
</head>
<body>
    <div>
        <form action="vendor/product/update.php" method="POST" class="form">
            <h1>Обновить товар</h1>
            <input type="hidden" value="<?= $product['id'] ?>" name="id">
            <div class="row">
                <label for="title">Название товара</label>
                <input type="text" name="title" id="title" value="<?= $product['title']?>">
            </div>
            <div class="row">
                <label for="price">Цена товара</label>
                <input type="number" name="price" id="price" value="<?= $product['price']?>">
            </div>
            <div class="row">
                <label for="description">Описание товара</label>
                <textarea name="description" id="description" cols="30" rows="10">
                    <?= $product['description']?>
                </textarea>
            </div>
            <button type="submit">Добавить продукт</button>
        </form>
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

    input, textarea {
        background-color: inherit;
        margin-top: 10px;
        font-size: 14px;
        padding:5px;
    }

    textarea {
        border: 1px solid black;
        font-size: 16px;
    }

    .form {
        width: 600px;
        margin-top: 40px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .row {
        display: flex;
        flex-direction: column;
        width: 100%;
    }

    .row, button {
        margin-top: 20px;
    }

    button {
        padding: 7px 14px;
        font-size: 16px;
        background-color: inherit;
        margin-bottom: 50px;
        border: 1px solid black;
        border-radius: 2px;
    }

    button:hover {
        cursor: pointer;
    }

</style>