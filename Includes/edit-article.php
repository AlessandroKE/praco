<?php

require 'includes/config.php';
require 'includes/article.php';

//$conn = getDB();
//$conn = dbConnect($host, $user, $password, $db_name);
if (isset($_GET['id'])) {

    $article = getArticle($conn, $_GET['id']);

    if ($article) {

        $title = $article['title'];
        $content = $article['content'];
        $published_at = $article['published_at'];

    } else {

        die("article not found");

    }

} else {

    die("id not supplied, article not found");
}

?>
<?php //require 'includes/header.php'; ?>

<h2>Edit article</h2>

<?php //require 'includes/article-form.php'; ?>

<?php require 'includes/footer.php'; ?>
