<?php

Class Article{


   public static function getArticle($conn) {
    $sql = "SELECT *
        FROM article
        ORDER BY published_at;";

$results = $conn->query($sql);

if ($results === false) {
  $conn->errorInfo();
} else {
    //$articles = mysqli_fetch_all($results, MYSQLI_ASSOC);
    //Fectching the results as an associative array
    return $results->fetchAll(PDO::FETCH_ASSOC);

}
   }
}

?>