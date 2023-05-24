
<?php
/*

$conn = dbConnect($host, $user, $password, $db_name);

function getArticle($conn, $id){

//$sql = 
$stmt= $conn->prepare ("SELECT * FROM article WHERE id = ?");
if($stmt==false){
echo mysqli_error($stmt);
}else{
$stmt->bind_param("i", $id);
}
$stmt->execute();
    $results = $stmt->fetch();

if ($results===false){
    //Query execution failed, handle the error
    echo "Query failed: ";
}else{
    return mysqli_fetch_array($results, MYSQLI_ASSOC);
   
}

}


?>
*/

// Assuming the dbConnect function is defined somewhere

// Establish the database connection
$conn = dbConnect($host, $user, $password, $db_name);

function getArticle($conn, $id) {
    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT * FROM article WHERE id = ?");
    
    if ($stmt === false) {
        echo $conn->error;
    } else {
        // Bind the parameter and execute the query
        $stmt->bind_param("i", $id);
        $stmt->execute();
        
        // Get the result set
        $result = $stmt->get_result();
        
        if ($result->num_rows === 0) {
            // Handle the case when the query result is empty
            echo "No article found.";
        } else {
            // Fetch the row as an associative array
            $article = $result->fetch_assoc();
            return $article;
        }
    }
}
?>
