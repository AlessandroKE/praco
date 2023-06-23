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
     * @return object An object containing the articles
     */

     public $errors = [];
    public static function getArticles($conn)
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
     * @param integer $id The article ID
     *
     * @return mixed An object of this class, or null if not found
     */
    public static function getById($conn, $id)
    {
        $sql = "SELECT * FROM article WHERE id = :id";

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

    /**
     * Update the article record
     *
     * @param object $conn Connection to the database
     *
     * @return bool True if update is successful, false otherwise
     */
    public function update($conn)
    {
        if ($this->validateArticle()) {
            $sql = "UPDATE article
                    SET title = :title,
                        content = :content,
                        published_at = :published_at
                    WHERE id = :id";

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
        } else {
            return false;
        }
    }

    /**
     * Validate the article properties
     *
     * @return bool True if the article is valid, false otherwise
     */
    protected function validateArticle()
    {
        if ($this->title == '') {
            $this->errors[] = 'Title is required';
        }

        if ($this->content == '') {
            $this->errors[] = 'Content is required';
        }

        if ($this->published_at != '') {
            //$stmt->bindParam(':date', $date_time, PDO::PARAM_STR);
           $date_time = date_create_from_format('Y-m-d g:i:A', $this->published_at);

            if ($date_time === false) {
                $this->errors[] = 'Invalid date and time';
            } else {
                $date_errors = date_get_last_errors();

                if ($date_errors['warning_count'] > 0) {
                    $this->errors[] = 'Invalid date and time';
                }
            }
        }

        return empty($this->errors);
    }
    
}
