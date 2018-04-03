<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
</head>
<body>
<h2>Header</h2>
<hr>
<a href="index.php?option=add">Add new task</a>
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
<form action="/<?= $item['task']['id'] ?>" method="get">
    <? foreach ($todo as $item) : ?>
        <div class="message">
            <p>Автор: <?= $item['user']['name'] ?> | Дата: <?= $item['task']['date'] ?></p>
            <p>Email: <?= $item['user']['email'] ?></p>
            <div>Task: <?= nl2br(htmlspecialchars($item['task']['text'])) ?></div>
            <img src="<?= IMAGE . $item['task']['img'] ?>" alt="<?= $item['task']['img'] ?>">
            <p><a href="index.php?option=delete/<?= $item['task']['id'] ?>">Delete this task</a></p>
            <p><a href="index.php?option=done/<?= $item['task']['id'] ?>">Done this task</a></p>
        </div>
    <? endforeach; ?>
</form>
<hr>
<h3>Footer</h3>
</body>
</html>