<?php

/**
 * Article
 *
 * A piece of writing for publication
 */
class Article
{
    /**
     * Unique identifier
     * @var integer
     */
    public $id;

    /**
     * The article title
     * @var string
     */
    public $title;

    /**
     * The article content
     * @var string
     */
    public $content;

    /**
     * The publication date and time
     * @var datetime
     */
    public $published_at;

    /**
     * Get all the articles
     *
     * @param object $conn Connection to the database
     *
     * @return  an object
     */
    public static function getArticle($conn)
    {
        $sql = "SELECT *
                FROM article
                ORDER BY published_at;";

        $results = $conn->query($sql);

        return $results->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get the article record based on the ID
     *
     * @param object $conn Connection to the database
     * @param integer $id the article ID
     * @param string $columns Optional list of columns for the select, defaults to *
     *
     * @return mixed An object of this class, or null if not found
     */
    public static function getById($conn, $id)
{
    $sql = "SELECT * FROM article WHERE Id = :id";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Article');

        if ($stmt->execute()) {
            return $stmt->fetch();
        }
    } catch (PDOException $e) {

        echo "Error retrieving the article: " . $e->getMessage();
        // Handle the exception, log or display an error message
        // You can also throw a custom exception if desired
    }

    return null; // Return null if execution fails or article is not found
}
public function update($conn)
    {
        $sql = "UPDATE article
                SET title = :title,
                    content = :content,
                    published_at = :published_at
                WHERE Id = :id";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
        $stmt->bindValue(':title', $this->title, PDO::PARAM_STR);
        $stmt->bindValue(':content', $this->content, PDO::PARAM_STR);

        if ($this->published_at == '') {
            $stmt->bindValue(':published_at', null, PDO::PARAM_NULL);
        } else {
            $stmt->bindValue(':published_at', $this->published_at, PDO::PARAM_STR);
        }

        return $stmt->execute();
    }
}
