<?php

session_start();
unset($_SESSION['doctor_id']);
session_destroy();
header('location:index.php');

?>