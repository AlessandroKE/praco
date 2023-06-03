<?php

require 'includes/config.php';
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
}
//Query statement
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$sql= "DELETE FROM article
WHERE id = ? ";

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
 }
}