<?php

include '../config.php';

include('../API/TaskRepository.php');
include('../API/UserRepository.php');

function __autoload($file)
{
    if (file_exists('../controller/' . $file . '.php')) {
        require_once '../controller/' . $file . '.php';
    } else {
        require_once '../model/' . $file . '.php';
    }
}


?>


<form action="" method="post">
    <input type="text" name="name" placeholder="name">
    <input type="text" name="pass" placeholder="pass">
    <button>Login</button>
</form>

<?php

$name = $_POST['name'];
$pass = $_POST['pass'];

$conn=new ConnectionMySql();
$sql = "SELECT * FROM admin WHERE name = '$name' and pass = '$pass'";
$result = mysqli_query($conn->getConnection(), $sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$count = mysqli_num_rows($result);

if($count == 1)
{
    $_SESSION['is_admin'] = 1;
} else
{
    $_SESSION['no_admin'] = 1;
}

if(isset($_SESSION['is_admin']))
{
$init = new AdminIndex();
echo $init->execute();
session_destroy();
}

?>



