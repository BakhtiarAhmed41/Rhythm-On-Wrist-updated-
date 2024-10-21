<?php

class createdb
{
    public $servername;
    public $username;
    public $password;
    public $dbname;
    public $tablename;
    public $con;

    // Constructor
    public function __construct(
        $dbname = "rhythm_on_wrist",
        $tablename = "producttb",
        $servername = "localhost",
        $username = "root",
        $password = ""
    ) {
        $this->dbname = $dbname;
        $this->tablename = $tablename;
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;

        // Connection
        $this->con = mysqli_connect($servername, $username, $password);

        // Check connection
        if (!$this->con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Query
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

        // Execute query
        if (mysqli_query($this->con, $sql)) {
            $this->con = mysqli_connect($servername, $username, $password, $dbname);

            $sql = "CREATE TABLE IF NOT EXISTS $tablename (
                id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                product_name VARCHAR(25) NOT NULL,
                product_price FLOAT,
                product_image VARCHAR(100)
            )";

            if (!mysqli_query($this->con, $sql)) {
                echo "Error creating table: " . mysqli_error($this->con);
            }

        }else {
            return false;
        }
    }
// Method to get products from the database
public function getdata()
{
    $sql = "SELECT * FROM $this->tablename";
    $result = mysqli_query($this->con, $sql);

    if (mysqli_num_rows($result) > 0) {
        return $result;
    }
}

public function getProductById($product_id)
{
    $sql = "SELECT * FROM $this->tablename WHERE id = $product_id";
    $result = mysqli_query($this->con, $sql);

    if (mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    }

    return null;
}
}


?>
