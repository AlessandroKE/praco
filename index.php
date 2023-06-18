<?php

session_start();

//require 'Includes/Config.php';
require 'classes/database.php';
require 'classes/article.php';

$db = new database();
$conn = $db->getConn();

$articles = Article::getArticle($conn)

/*
$sql = "SELECT *
        FROM article
        ORDER BY published_at;";

$results = $conn->query($sql);

if ($results === false) {
  $conn->errorInfo();
} else {
    //$articles = mysqli_fetch_all($results, MYSQLI_ASSOC);
    //Fectching the results as an associative array
    $articles = $results->fetchAll(PDO::FETCH_ASSOC);

}
*/
?>
<?//php require 'includes/header.php'; ?>
<?php if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']): ?>

<p>You are logged in. <a href="logout.php">Log out</a></p>

<?php else: ?>

<p>You are not logged in. <a href="login.php">Log in</a></p>

<?php endif; ?>

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
