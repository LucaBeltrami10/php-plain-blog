<?php
include './server.php';

$inputUsername = isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '';
$inputPassword = isset($_POST['password']) ? $_POST['password'] : '';

/* Creo la query con i parametri da ricercare come '?' */
$sqlUser = "SELECT * FROM `users` WHERE `users`.`username` = ? ";
/*
 preparo l'invio al server
 Sostituisco i parametri '?' con la variabile inserita dall'utente
 eseguo la query
 ne rivevo i risultati
 risultati sotto forma di array associativo
*/
$usersStmt = mysqli_prepare($conn, $sqlUser);
mysqli_stmt_bind_param($usersStmt, "s", $inputUsername);
mysqli_stmt_execute($usersStmt);
$userResults = mysqli_stmt_get_result($usersStmt);
$user = mysqli_fetch_assoc($userResults);
/* se UserRerults esiste
    $user restituisce la chiave 'password' con valore hashato nel database.
    se $user esiste:
        verifico la password inserita dall'utente con la password hashata che coincide con il suo username
 */

if ($userResults) {

    if ($user) {
        if (password_verify($inputPassword, $user['password'])) {
            $_SESSION['userLogged'] = true;
            header("Location: user_data.php");
            exit();
        } else {
            header("Location: login.php");
            exit();
        }
    } else {
        header("Location: login.php");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
