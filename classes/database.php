<?php
class database {
    public $host = "localhost";
    public $user = "root";
    public $password = "";
    public $db_name = "cms";

    public function getConn()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name . ';charset=utf8';
        return new PDO($dsn, $this->user, $this->password);
    }
}
