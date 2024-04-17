<?php
include './server.php';
$inputUsername = isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '';
$inputPassword = isset($_POST['password']) ? $_POST['password'] : '';

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

/* se rerults esiste
    $row restituisce la chiave 'password' con valore hashato nel database.
    se $row esiste:
        verifico la password inserita dall'utente con la password hashata che coincide con il suo username
 */
if ($results) {
    $row = mysqli_fetch_assoc($results);
    if ($row) {
        if (password_verify($inputPassword, $row['password'])) {
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
