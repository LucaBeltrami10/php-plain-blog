<?php
include 'server.php';
session_start();
$_SESSION['userLogged'] = false;
header("Location: login.php");
exit();
