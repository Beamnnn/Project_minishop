<?php include('connect.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Mali:ital@1&display=swap');

        .button {
            background-color: #DDD5F3;
            border-radius: 8px;
            color: #8e44ad;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }


        td,
        th {
            color: #8e44ad;
            border: 1px solid rgb(190, 190, 190);
            padding: 10px;
        }

        td {
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #d7d9f2;
        }

        caption {
            padding: 10px;
            caption-side: bottom;
        }

        table {
            border-collapse: collapse;
            border: 2px solid rgb(122, 92, 166);
            letter-spacing: 1px;
            font-family: 'Mali', cursive;
            font-size: 0.8rem;
        }

        .b {
            font-family: 'Mali', cursive;
            color: #8e44ad;
        }
    </style>
</head>

<body>

    <a class="button" href="index.php">Back</a>
    <br><br>
    <?php
    $sql = $pdo->prepare("SELECT order.Item_amount, item.Item_name
        FROM `order`
        INNER JOIN item ON `order`.ID_Item = item.ID_Item
        ORDER BY order.Item_amount DESC
        LIMIT 5;");
    $sql->execute();
    ?>
    <table class="table">
        <p class="b">5 อันดับสินค้าขายดี</p>
        <th> Product </th>
        <th> Quantity </th>
        <?php while ($row = $sql->fetch()) { ?>
            <tr class="table-light">
                <td><?= $row["Item_name"] ?></td>
                <td><?= $row["Item_amount"] ?></td>
            </tr>

        <?php } ?>


        <?php
        $sql = $pdo->prepare("SELECT
        YEAR(`order`.Time) AS Year,
        MONTH(`order`.Time) AS Month,
        SUM(`item`.Item_price * `order`.Item_amount) AS MonthlySales,
        item.Item_name,
        item.Item_price
    FROM
        `order`
    INNER JOIN
        item ON `order`.ID_Item = item.ID_Item
    WHERE
        MONTH(`order`.Time) = 10
    GROUP BY
        YEAR(`order`.Time), MONTH(`order`.Time), item.ID_Item
    ORDER BY
        Year, Month, MonthlySales DESC;
        ");

        $sql->execute();
        ?>
        <table class="table">
            <p class="b">ยอดรวมการขายรายเดือน </p>
            <th> Product </th>
            <th> Total </th>
            <?php while ($row = $sql->fetch()) { ?>
                <tr class="table-light">
                    <td><?= $row["Item_name"] ?></td>
                    <td><?= $row["MonthlySales"] ?></td>

                </tr>

            <?php } ?>


</body>

</html>