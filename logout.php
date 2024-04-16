<?php
include 'server.php';
session_start();
unset($_SESSION['userLogged']);
header("Location: login.php");
exit();
