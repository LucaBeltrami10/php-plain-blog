<?php
session_start();

$serverHost = '127.0.0.1';
$userName = 'root';
$password = 'root';
$databaseName = 'personal_blog_training';
$port = '3306';

$conn = mysqli_connect($serverHost, $userName, $password, $databaseName, $port);

if (!$conn) {
    die("Connessione fallita: " . mysqli_connect_error());
}
echo "Connessione riuscita";
