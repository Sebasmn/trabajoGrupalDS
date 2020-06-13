<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header('Location:  index.php');
    session_unset();
session_destroy();
}else{
    header('Location:  index.php');
}


?>