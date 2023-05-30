<?php

require 'includes/Config.php';
require 'includes/article.php';

$errors = [];
$title = '';
$content = '';
$published_at = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = dbConnect($host, $user, $password, $db_name);

    $title = mysqli_real_escape_string($db, $_POST['title']);
    $content =  mysqli_real_escape_string($db, $_POST['content']);
    $published_at = mysqli_real_escape_string($db, $_POST['published_at']);

    /*
    $title = $_POST['title'];
    $content = $_POST['content'];
    $published_at = $_POST['published_at'];

    */

    $errors= validateArticle($title, $content, $published_at);
    
    if(empty($errors)) {

        //$conn = dbConnect($host, $user, $password, $db_name);

        $sql = "INSERT INTO article (title, content, published_at) VALUES (?, ?, ?)";

        $stmt = mysqli_prepare($db, $sql);

        if ($stmt === false) {

            echo mysqli_error($conn);

        } else {
            if ($published_at == '') {
                $published_at = null;
            }

          

            mysqli_stmt_bind_param($stmt, "sss", $title, $content, $published_at);

            if (mysqli_stmt_execute($stmt)) {

                $id = mysqli_insert_id($db);

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
    }
}

?>
<?php require 'includes/footer.php'; ?>

<h2>New article</h2>

<?php require 'Includes/article-form.php'; ?>
    

<?php require 'includes/footer.php'; ?>
