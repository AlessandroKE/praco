<?php

include 'Includes/Config.php';
include 'Includes/Footer.php';

if (mysqli_connect_error()) {
    echo mysqli_connect_error();
    exit;
}
$con = dbConnect($host, $user, $password, $db_name);
$sql = "SELECT *
        FROM article
        WHERE id = 3";

$results = mysqli_query($con, $sql);

if ($results === false) {
    echo mysqli_error($con);
} else {
    $article = mysqli_fetch_assoc($results);//mysqli_fetch_assoc($results);
    // Fetches a single article from the database/results
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>My blog</title>
    <link rel="stylesheet" type="text/css" href="Text.css">
    <meta charset="utf-8">
</head>
<body>

    <header>
        <h1>My blog</h1>
    </header>

    <main>
        <?php if ($article === null): ?>
            <p>Article not found.</p>
        <?php else: ?>

            <article>
                <h2><?= $article['title']; ?></h2>
                <p><?= $article['content']; ?></p>
            </article>

        <?php endif; ?>
    </main>
</body>
</html>
