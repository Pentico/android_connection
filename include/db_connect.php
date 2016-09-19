<?php
/**
 * Created by PhpStorm.
 * User: Tuane
 * Date: 2016/09/19
 * Time: 10:48 AM
 */

class DB_CONNECT {

    // constructor
    function __construct(){
        // connecting to database
        $this->connect();
    }

    // destructor
    function __destruct(){
        $this->close();
    }

    /**
     * Function to connect with database
     */
    function connect() {
        // import database connectoin variables
        require_once __DIR__ . '/db_config.php';

        // Connecting to mysql database
        $con = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD);
        // Selecting database
        $db = mysqli_select_db($con,DB_DATABASE) or die(mysqli_error($con)); // The error link

        // returning connection cursor
        return $con;
    }

    /**
     * Function to close db connection
     */
    function close() {
        // closing db connection
        mysqli_close($this->connect());
    }
}