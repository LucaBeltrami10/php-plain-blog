<?php

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

$inputUsername = isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '';
$inputPassword = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : '';

/* if (isset($inputPassword) && isset($inputUsername)) {
    echo $inputPassword;
    echo $inputUsername;
} */

/* Creo la query con i parametri da ricercare come '?' */
$sql = "SELECT * FROM `users` WHERE `users`.`username` = ? ";
/*
 preparo l'invio al server
 Sostituisco i parametri '?' con la variabile inserita dall'utente
 eseguo la query
 ne rivevo i risultati
*/
$usersStmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($usersStmt, "s", $inputUsername);
mysqli_stmt_execute($usersStmt);
$results = mysqli_stmt_get_result($usersStmt);

if (mysqli_num_rows($results) > 0) {
    echo 'Utente Trovato';
} else {
    echo 'Utente non registrato';
}
