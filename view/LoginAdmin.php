<?php



?>
<?php
//session_destroy();
if (!isset($_SESSION['is_admin'])): ?>
    <form action="" method="post">
        <input type="text" name="name" placeholder="name">
        <input type="text" name="pass" placeholder="pass">
        <button>Login</button>
    </form>
<?php endif; ?>

