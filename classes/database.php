<?php
class database {
    public $host = "localhost";
    public $user = "root";
    public $password = "";
    public $db_name = "cms";


    //{$this} is a special variable that refers to the current instance of the class. 
    //It is used within class methods to access properties and methods of the class.

    //PDO uses  object oriented programming for handling errors (exceptions)
    
    public function getConn()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name . ';charset=utf8';

        //Checking for errors using try and catch method
        try{
        return new PDO($dsn, $this->user, $this->password);
        }catch(PDOException $e){

            echo "Error: " . $e->getMessage();

        }
    }
}
