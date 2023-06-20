<?php

require 'classes/database.php';
require 'classes/Article.php';


$db = new database();
$conn = $db->getConn();

if (isset($_GET['id'])) {

    $article = Article::getById($conn, $_GET['id']);

} else {
    $article = null;
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

<a href = "edit-article.php?id=<?=$article->id; ?>">Edit</a>
<a href = "delete-article.php?id=<?=$article->id; ?>">Delete</a>

<?php endif; ?>

<?php require 'includes/footer.php'; ?>
