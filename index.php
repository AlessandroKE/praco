<?php

require 'Includes/Config.php';

$db = dbConnect($host, $user, $password, $db_name);

$sql = "SELECT *
        FROM article
        ORDER BY published_at;";

$results = mysqli_query($db, $sql);

if ($results === false) {
    echo mysqli_error($db);
} else {
    $articles = mysqli_fetch_all($results, MYSQLI_ASSOC);
}

?>
<?//php require 'includes/header.php'; ?>

<a href="new_article.php">New article</a>

<?php if (empty($articles)): ?>
    <p>No articles found.</p>
<?php else: ?>

    <ul>
        <?php foreach ($articles as $article): ?>
            <li>
                <article>
                    <h2><a href="article.php?id=<?= $article['Id']; ?>"><?= htmlspecialchars($article['title']); ?></a></h2>
                    <p><?= htmlspecialchars($article['content']); ?></p>
                </article>
            </li>
        <?php endforeach; ?>
    </ul>

<?php endif; ?>

<?php require 'includes/footer.php'; ?>
