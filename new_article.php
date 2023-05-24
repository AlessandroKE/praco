<?php
include 'Includes/Config.php';
include 'Includes/Footer.php';

//Vulnerability to my sql injection plugin.

//Solution:
//MYSQLI provides us with a function real escpae string:
//Use of prepared statements.


$db = dbConnect($host, $user, $password, $db_name);
if ($_SERVER["REQUEST_METHOD"] == "POST") {

//Ajax use it to reload code:
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $content =  mysqli_real_escape_string($db, $_POST['content']);
    $published = mysqli_real_escape_string($db, $_POST['published_at']);
    //OR in condtitional statements
    if ($title == ''  || $content == '' || $published == '') {-
        header("location: new_article.php?err=Please fill the required fields");
    } else {
        $stmt = $db->prepare("INSERT INTO article (title, content, published_at) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $title, $content, $published);
        $stmt->execute();
        // Check for errors during execution
        if ($stmt->errno) {
            header("location: new_article.php?info=Please fill the required fields");
        } else {
            header("location: article.php?info=Article sucessfully updated");
        }
        // Close the prepared statement
        $stmt->close();
    }
} else {
    echo "Error: " . $db->error;
}


/*    
$stmt = mysqli_query($con, $sql);

if ($stmt === false) {
    echo mysqli_error($con);
} else {
    $id = mysqli_insert_id($con);

    echo "Inserted a record with id .$id.";
}
    }

    */

//Insert a new artile into the database
// use of Var_dump: example var_dump($sql); Displays content of the SQL statement.

?>
<html>

<body>
    <form method="post" action="new_article.php">
        <?php
        if(isset($_GET['err'])){
            echo "<div style='color:red;'>".$_GET['err']."</div>";
        }

        if(isset($_GET['info'])){
            echo "<div style='color:green;'>".$_GET['info']."</div>";
        }
        ?>
        <div>
            <label for = "title">Title</label>
            <input id = "title" name="title" placeholder="Article Title"></label>
        </div>

        <div>
        <label for = "content">Content</label>
          <textarea id= "content" name="content" placeholder="Article Content" required></textarea></label>
        </div>

        <div>
            Date and Time: <input type="datatime-local" name="published_at" >
        </div>

        <button value="Submit">Submit</button>

    </form>
</body>

</html>