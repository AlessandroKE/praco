<?php

include 'Includes/Config.php';
include 'Includes/Footer.php';
include 'Includes/edit_article.php';


if (mysqli_connect_error()) {
    echo mysqli_connect_error();
    exit;
}
//$conn = dbConnect($host, $user, $password, $db_name);
if (isset($_GET['id'])){
    $article= getArticle($conn, $_GET['id']);
} else{
    $article = null;
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
