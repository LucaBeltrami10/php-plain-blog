<?php
include 'server.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php-plain-blog</title>
    <!-- cdn boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div>
        <form action="index.php" class="d-flex" method="POST">
            <div class="d-flex">
                <label for="username">Username</label>
                <input id="username" name="username" type="text">
            </div>
            <div class="d-flex">
                <label for="password">Password</label>
                <input id="password" name="password" type="password">
                <button type="submit">Invio</button>
            </div>
        </form>
    </div>
    <header>

    </header>

</body>

</html>