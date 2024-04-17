<?php
include './server.php';
$sqlAllPosts = 'SELECT * FROM `posts`';

$allPostStmt = mysqli_prepare($conn, $sqlAllPosts);
mysqli_stmt_execute($allPostStmt);
$postsResults = mysqli_stmt_get_result($allPostStmt);
$posts = array();

/* per ogni riga di risultato mi crea un array che verrà inserito all'interno dell'array $posts */
while ($row = mysqli_fetch_assoc($postsResults)) {
    $posts[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">MyBlog</a>
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
        <div class="container">
            <!-- <?php var_dump($posts); ?> -->
            <div class="row">
                <?php foreach ($posts as $post) { ?>
                    <div class="col-12 mt-4">
                        <div class="card">
                            <img class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $post['title'] ?></h5>
                                <p class="card-text"><?php echo $post['content'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </main>

</body>

</html>