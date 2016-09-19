<?php
/**
 * Created by PhpStorm.
 * User: Tuane
 * Date: 2016/09/19
 * Time: 11:05 AM
 */

/**
 * Following code will create a new order roww
 * All product details are read from HTTP POST Request
 */

// array for JSON response
$response = array();

if (isset($_POST['name']) && isset($_POST['heroes'])){

    $name1   = $_POST['name'];
    $heroes1 = $_POST['heroes'];

    // include db_connect class
    require_once __DIR__ . '/include/db_connect.php';

    // connecting to db
    $db  = new DB_CONNECT();

    // mysql inserting a new row
    $result = mysqli_query($db->connect(), "INSERT INTO organaisation(username, heroes1) 
            VALUES('$name1', '$heroes1') ");

    if ($result) {

        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "Order successfully created.";

        // enchoing JSON response
        echo json_encode($response);
    } else {

        // Failed to insert row
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";

        // echoing JSON response
        echo json_encode($response);
    }

}else {

    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    // echoing JSON response
    echo json_encode($response);
}