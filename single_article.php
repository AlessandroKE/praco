<?php

require 'classes/database.php';
require 'classes/Article.php';


$db = new database();
$conn = $db->getConn();

// Initialize variables
$article = null;
$errors = [];

// Check if article ID is provided in the URL
if (isset($_GET['id'])) {
    $article = Article::getById($conn, $_GET['id']);

    if ($article === null) {
        $errors[] = "Article not found.";
    }
} else {
    $errors[] = "Invalid article ID.";
}
?>
<?//php require 'includes/header.php'; ?>

<?php if ($article === null): ?>
    <p>Article not found.</p>
<?php else: ?>

    <article>

        <h2><?= htmlspecialchars($article->title); ?></h2>
        <p><?= htmlspecialchars($article->content); ?></p> 

    </article>

    <a href="edit-article.php?id=<?= $article->Id; ?>">Edit</a>
    <a href="delete-article.php?id=<?= $article->Id; ?>">Delete</a>

    <?//php var_dump($article); ?> <!-- Add this line for debugging -->


<?php endif; ?>

<?php require 'includes/footer.php'; ?>
