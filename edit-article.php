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

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $article->title = $_POST['title'];
    $article->content = $_POST['content'];
    $article->published_at = $_POST['published_at'];

    //$errors = validateArticle($title, $content, $published_at);
  //  $errors = validateArticle($article->title, $article->content, $article->published_at);
   


        /* $sql ='UPDATE article SET title = ?, content=?,  published_at =? WHERE id = ?';

        //$stmt = mysqli_prepare($sql);

        $stmt->prepare($sql);
        if ($stmt === false) {

            //echo mysqli_error($conn);

        } else {
            if ($published_at == '') {
                $published_at = null;
            }

          
            mysqli_stmt_bind_param($stmt, "sssi", $title, $content, $published_at,$id);

 */

            if ($article->update($conn)) {

                //$id = mysqli_insert_id($db);

                header("location: single_article.php?id= {$article->Id}");

                //header("Location: $protocol://" . $_SERVER['HTTP_HOST'] . "/article.php?id=$id");
                exit;
/* 
            } 
            else {

                die("form is valid");
 */
        }

        
   

}

//var_dump($article);
?>
<?php //require 'includes/header.php'; ?>

<h2>Edit article</h2>


<?php require 'includes/article-form.php'; ?>

<?php require 'includes/footer.php'; ?>
