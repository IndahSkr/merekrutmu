<?php
session_start();
unset($_SESSION['upkey']);
unset($_SESSION['uname']);
unset($_SESSION['idlevel']);
unset($_SESSION['iduser']);
session_destroy();
header("location:../pages/user/login.php");
?>