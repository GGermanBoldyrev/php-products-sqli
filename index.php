<?php

require_once 'config/connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
</head>
<body>
    <div class="page">
        <div class="title">
            <h1>Таблица товаров</h1>
        </div>
        <div>
            <table>
                <tr>
                    <th>Id товара</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Описание</th>
                    <th>Изменить</th>
                    <th>Удалить</th>
                </tr>
                <?php

                $products = mysqli_query($connect, "SELECT * FROM `products`");

                foreach ($products as $product): echo
                <<<ITEM
                    <tr>
                        <td>$product[id]</td>
                        <td><a href="product.php?id=$product[id]">$product[title]</a></td>
                        <td>$product[price] rub</td>
                        <td>$product[description]</td>
                        <td><a href="update.php?id=$product[id]">Изменить</a></td>
                        <td><a href="vendor/product/delete.php?id=$product[id]">Удалить</a></td>
                    </tr>
                ITEM;
                endforeach; ?>
            </table>

            <form action="vendor/product/create.php" method="POST" class="form">
                <h1>Добавить товар</h1>
                <div class="row">
                    <label for="title">Название товара</label>
                    <input type="text" name="title" id="title">
                </div>
                <div class="row">
                    <label for="price">Цена товара</label>
                    <input type="number" name="price" id="price">
                </div>
                <div class="row">
                    <label for="description">Описание товара</label>
                    <textarea name="description" id="description" cols="30" rows="10"></textarea>
                </div>
                <button type="submit">Добавить продукт</button>
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
        color: black;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    th, td {
        border: 1px solid black;
        padding: 10px;
    }

    .page {
        width: 80%;
    }

    .title {
        text-align: center;
    }

    .row {
        width: 50%;
        display: flex;
        flex-direction: column;
    }

    input, textarea {
        background-color: inherit;
        margin-top: 10px;
        font-size: 14px;
        padding:5px;
    }

    textarea {
        border: 1px solid black;
    }

    .form {
        margin-top: 40px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .row, button {
        margin-top: 20px;
    }

    button {
        padding: 7px 14px;
        font-size: 18px;
        background-color: inherit;
        margin-bottom: 50px;
        border: 1px solid black;
        border-radius: 2px;
    }

    button:hover {
        cursor: pointer;
    }

</style>