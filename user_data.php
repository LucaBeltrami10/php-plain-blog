<?php
session_start();

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

    <?php if ($_SESSION['userLogged'] === true) { ?>
        <header>
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Navbar</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <form action="all_posts.php">
                                    <button type="submit" class="nav-link active" aria-current="page">Tutti i post</button>
                                </form>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">I miei post</a>
                            </li>
                        </ul>
                        <form action="./logout.php">
                            <button type="submit button" class="btn btn-danger"> logout</button>
                        </form>
                    </div>
                </div>
            </nav>
        </header>
        <main>
            <div class="container text-center">
                <h1 class="mt-5">pagina dove si visualizzano i post</h1>

            </div>
        </main>
    <?php } else { ?>
        <header>
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Navbar</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <form action="all_posts.php">
                                    <button type="submit" class="nav-link active" aria-current="page">Tutti i post</button>
                                </form>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">I miei post</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <main>
            <div class="container text-center">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="mt-5">Non hai i permessi per accedere. Effettua il Login</h1>
                    </div>
                    <div class="container d-flex justify-content-center align-items-center">
                        <form action="login_controller.php" class="mt-5" method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input id="username" class="form-control" name="username" type="text">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input id="password" class="form-control" name="password" type="password">
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>

            </div>
        </main>
    <?php }  ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>