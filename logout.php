<?php
//this just logs people out. simple! no magic here - move along
session_start();
unset($_SESSION['SAaddr']);
unset($_SESSION['SAtoken']);
header("location:index.php");
?>
