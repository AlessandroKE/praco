<?php
//include function in php. Used to include the contents of one PHP file into another PHP file.
include 'Includes/Config.php';
include 'Includes/Footer.php';

$db = dbConnect($host, $user, $password, $db_name);

$sql = "SELECT * FROM Article /*WHERE id = 4*/ ORDER BY published_at";

//executing the query
$result = mysqli_query($db, $sql);
 
//Checking if the query was successful
if($result === false){
    // If the query fails, display the error message and exit the script
    echo "Error: " . mysqli_error($con);
    exit;
} else {
    // If the query was successful, fetch the results
$articles = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>My blog</title>
    <link rel="stylesheet" type="text/css" href="Text.css">
    <meta charset="utf-8">
</head>
<body>
    <header>
        <h1>My Articles</h1>
    </header>

    <main>
        <?php if (empty($articles)): ?>
            <p>No articles found.</p>
        <?php else: ?>

            <ul>
                <?php foreach ($articles as $article): ?>
                    <li>
                        <article>
                            <h2><?= $article['title']; ?></h2>
                            <p><?= $article['content']; ?></p>
                        </article>
                    </li>
                <?php endforeach; ?>
            </ul>

        <?php endif; ?>
        
    </main>
    
</body>
</html>

