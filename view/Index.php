<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index page</title>
</head>
<body>
<h2>Header</h2>
<hr>
<a href="<?= getBaseUrl() . '?add'?>">Add new task</a> |
<a href="<?= getBaseUrl() . 'admin' ?>">Go to admin</a> |
<th><a href="?sort=name">Sort by name:</a></th>
|
<th><a href="?sort=email">Sort by email:</a></th>
|
<th><a href="index.php">Default sort</a></th>
<style>

    .message {
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 20px;
    }

    .message img {
        border: 1px solid #ddd; /* Gray border */
        border-radius: 4px; /* Rounded border */
        padding: 5px; /* Some padding */
        width: 320px; /* Set a small width */
        height: 240px; /* Set a small width */
    }

</style>
<form action="" method="get">
    <?php foreach ($allTask as $item) : ?>
        <div class="message">
            <p>Автор: <?php echo $item['user']['name'] ?> | Дата: <?= $item['task']['date'] ?></p>
            <p>Email: <?php echo $item['user']['email'] ?></p>
            <div>Task: <?= nl2br(htmlspecialchars($item['task']['text'])) ?></div>
            <img src="<?php echo '/view/assets/img/' . $item['task']['img'] ?>"
                 alt="<?php echo $item['task']['img'] ?>">
        </div>
    <?php endforeach; ?>
</form>
<?php
$limit = 3;
$conn = new ConnectionMySql();
$sql = "SELECT COUNT(*) FROM tasks";
$rs_result = mysqli_query($conn->getConnection(), $sql);
$row = mysqli_fetch_row($rs_result);
$total_records = $row[0];
$total_pages = ceil($total_records / $limit);
$pagLink = "<div class='pagination'>";
for ($i=1; $i<=$total_pages; $i++) {
    $pagLink .= "<a href='?page=".$i."'>".$i."</a> ------ ";
};
echo $pagLink . "</div>";
//?>

<h3>Footer</h3>
</body>
</html>
