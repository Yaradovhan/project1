<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
</head>
<body>
<h2>Header</h2>
<a href="<?= HOME; ?>">Home page</a>
<hr>
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
<div class="container">

    <?php
    $host = $_SERVER['HTTP_HOST'];
    $request = $_SERVER['REQUEST_URI'];
    $actionEdit = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$host$request" . "edit.php";

    ?>
<!--    <form action="" method="get">-->
    <?php foreach ($allData as $item) : ?>
        <form class="message" action="<?php echo $actionEdit; ?>" method="post">
            <input type="hidden" name="task[id]" value="<?php echo $item['task']['id'] ?>">
            <p>Автор: <?php echo $item['user']['name'] ?> | Дата: <?php echo $item['task']['date'] ?></p>
            <p>Email: <?php echo $item['user']['email'] ?></p>
            <textarea name="task[text]"><?php echo nl2br(htmlspecialchars($item['task']['text'])); ?></textarea><br>
            <img src="<?php echo '/view/assets/img/' . $item['task']['img'] ?>"
                 alt="<?php echo $item['task']['img'] ?>"><br>
            <button>Edit Task</button>
            <button>Check task</button>
        </form>
    <?php endforeach; ?>
    <?php
    $limit = 3;
    $conn = new ConnectionMySql();
    $sql = "SELECT COUNT(*) FROM tasks";
    $rs_result = mysqli_query($conn->getConnection(), $sql);
    $row = mysqli_fetch_row($rs_result);
    $total_records = $row[0];
    $total_pages = ceil($total_records / $limit);
    $pagLink = "<div class='pagination'>";
    for ($i = 1; $i <= $total_pages; $i++) {
        $pagLink .= "<a href='/admin/index.php?page=" . $i . "'>" . $i . "</a> ------ ";
    };
    echo $pagLink . "</div>";
    //?>
</div>
<hr>
<h3>Footer</h3>
</body>
</html>