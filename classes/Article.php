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

   public static function getById($conn, $id) {
    $sql = "SELECT * FROM article WHERE Id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    // Add error handling or return a default value if needed
    return null;
}

}

?>