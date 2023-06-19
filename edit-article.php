<?php

require 'classes/database.php';
require 'classes/article.php';

//$conn = getDB();
//$conn = dbConnect($host, $user, $password, $db_name); 
$db = new database();
$conn = $db->getConn();


if (isset($_GET['id'])) {

    $article = Article::getArticle($conn, $_GET['id']);

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
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = dbConnect($host, $user, $password, $db_name);

    $title = mysqli_real_escape_string($db, $_POST['title']);
    $content =  mysqli_real_escape_string($db, $_POST['content']);
    $published_at = mysqli_real_escape_string($db, $_POST['published_at']);


    $errors= validateArticle($title, $content, $published_at);

    if(empty($errors)){
        $sql ='UPDATE article SET title = ?, content=?,  published_at =? WHERE id = ?';

        $stmt = mysqli_prepare($db, $sql);

        if ($stmt === false) {

            echo mysqli_error($conn);

        } else {
            if ($published_at == '') {
                $published_at = null;
            }

          
            mysqli_stmt_bind_param($stmt, "sssi", $title, $content, $published_at,$id);

            if (mysqli_stmt_execute($stmt)) {

                //$id = mysqli_insert_id($db);

                if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
                    $protocol = 'https';
                } else {
                    $protocol = 'http';
                }
                header("location: article.php?id=".$id);

                //header("Location: $protocol://" . $_SERVER['HTTP_HOST'] . "/article.php?id=$id");
                exit;

            } else {

                echo mysqli_stmt_error($stmt);

            }
        }

        die("form is valid");

    }

}
//var_dump($article);
?>
<?php //require 'includes/header.php'; ?>

<h2>Edit article</h2>


<?php require 'includes/article-form.php'; ?>

<?php require 'includes/footer.php'; ?>
