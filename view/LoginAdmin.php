<?php

//if(isset($_SESSION['is_admin']))
//{
//    header("Location: " . getBaseUrl());
//}

$name = isset($_POST['name']) ? $_POST['name'] : '';
$pass = isset($_POST['pass']) ? $_POST['pass'] : '';

if ($name && $pass) {
    $conn = new ConnectionMySql();
    $sql = "SELECT * FROM admin WHERE name = '$name' and pass = '$pass'";
    $result = mysqli_query($conn->getConnection(), $sql);
//        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
//        var_dump($count);
    if ($count === 1) {
        $_SESSION['is_admin'] = 1;
    }

}


?>
<?php
session_destroy();
if (!isset($_SESSION['is_admin'])): ?>
    <form action="" method="post">
        <input type="text" name="name" placeholder="name">
        <input type="text" name="pass" placeholder="pass">
        <button>Login</button>
    </form>
<?php endif; ?>

