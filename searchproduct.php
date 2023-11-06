<?php
include "connect.php";
$data = $_GET["shoename"];
$stmt = $pdo->prepare("SELECT * FROM item WHERE Item_name LIKE '%$data%'");
$stmt->execute();
echo '<ul>';

/* Fetching Result From Data Base. */
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
    <li onclick='fill("<?= $row["Item_name"]; ?>")'>
        <a href="./PRODUCT/Stock/shoe.php?data=<?php echo $row['ID_Item']; ?>">
            <?php echo $row['Item_name']; ?>
        </a>
    </li>

<?php
}
?>