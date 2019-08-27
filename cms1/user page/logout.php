<?php
session_start();
session_destroy();
header('location: ../login/login2.php');
?>