
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
//$conn = dbConnect($host, $user, $password, $db_name);

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
        
        if ($result->num_rows === 0){ 
            // Handle the case when the query result is empty
            echo "No article found.";
        } else {
            // Fetch the row as an associative array
            $article = $result->fetch_assoc();
            return $article;
        }
    }
}

function validateArticle($title,$content,$published_at){
    $errors = [];

    if ($title == '') {
        $errors[] = 'Title is required';
    }
    if ($content == '') {
        $errors[] = 'Content is required';
    }

    if ($published_at != '') {
        $date_time = date_create_from_format('Y-m-d g:i:A', $published_at);
        
        if ($date_time === false) {

            $errors[] = 'Invalid date and time';

        } else {

            $date_errors = date_get_last_errors();

            if ($date_errors['warning_count'] > 0) {
                $errors[] = 'Invalid date and time';
            }
        }
    }
    return $errors;
}
?>
