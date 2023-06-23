<?php
require 'classes/database.php';
require 'classes/Article.php';
//include 'includes/article.php';
//include 'includes/article.php';
//require 'single_article.php';

//$conn = getDB();
//$conn = dbConnect($host, $user, $password, $db_name); 

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
/* require 'includes/config.php';
require 'includes/article.php';

//$conn = getDB();
$conn = dbConnect($host, $user, $password, $db_name);
if (isset($_GET['id'])) {

    $article = getArticle($conn, $_GET['id']);

    if ($article) {

        $id = $article['Id'];
        $title = $article['title'];
        $content = $article['content'];
        $published_at = $article['published_at'];

    } else {

        die("article not found");

    }

} else {

    die("id not supplied, article not found");
} */


//Query statement
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($article->delete($conn)) {
        header("Location: index.php"); // Corrected syntax for the header() function
        exit; // Terminates the script execution after the redirect
    }
/* $sql= "DELETE FROM article
WHERE Id = ? ";

 $stmt = mysqli_prepare($conn, $sql);
//Validate the statement.
 if ($stmt === false) {

     echo mysqli_error($conn);

 } else {
   
     mysqli_stmt_bind_param($stmt, "i", $id);

     if (mysqli_stmt_execute($stmt)) {

         //$id = mysqli_insert_id($db);
         header("Location: index.php");

         //header("Location: $protocol://" . $_SERVER['HTTP_HOST'] . "/article.php?id=$id");
         exit;

     } else {

         echo mysqli_stmt_error($stmt);

     }
 } */
}
?>
<h2>Delete article</h2>

<form method = post >
    <p>Are you sure?</p>
<button>Delete</button>
<a href = "article.php?id=<?=$article->Id;?>">Cancel</a>
</form>

<?php //require 'includes/article-form.php'; ?>

<?php require 'includes/footer.php'; ?>

