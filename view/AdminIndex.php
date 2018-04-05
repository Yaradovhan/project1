<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index page</title>
</head>
<body>
<h2>Header</h2>
<hr>
<a href="index.php?add">Add new task</a>
<style>

    .message {
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 20px;
    }

    .message img {
        padding: 10px;
        border: 2px solid #32007d;
        margin-top: 10px;
    }

</style>
<!--<form action="/--><? //= $item['task']['id'] ?><!--" method="get">-->
<div class="container">
    <!--

    user:
        name
        email
    task:
        id
        text
        image
    -->
    <?php
    $host = $_SERVER['HTTP_HOST'];
    $request = $_SERVER['REQUEST_URI'];
    $actionEdit = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$host$request" . "edit.php";

    var_dump($allData);
    ?>
    <?php foreach ($allData as $item) : ?>
        <form class="message" action="<?php echo $actionEdit; ?>" method="post">
            <input type="hidden" name="task[id]" value="<?php echo $item['task']['id'] ?>">
            <p>Автор: <?php echo $item['user']['name'] ?> | Дата: <?php echo $item['task']['date'] ?></p>
            <p>Email: <?php echo $item['user']['email'] ?></p>
            <textarea name="task[text]"><?php echo nl2br(htmlspecialchars($item['task']['text']))?></textarea>
            <img src="<?php echo IMAGE . $item['task']['img'] ?>" alt="<?php echo $item['task']['img'] ?>">
            <button>Edit Task</button>
        </form>
    <?php endforeach; ?>
</div>
<hr>
<h3>Footer</h3>
</body>
</html>