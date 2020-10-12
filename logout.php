<?php
session_start();
unset($_SESSION['userData']);
session_destroy();
echo '<script> location.replace("login.php"); </script>';
?>