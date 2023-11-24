<?php
include '../connection.php';

header("Access-Control-Allow-Origin: http://localhost:3306");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// Check if 'user_email' key exists in the $_POST array
$userEmail = isset($_POST['user_email']) ? $_POST['user_email'] : null;

if ($userEmail !== null) {
    $sqlQuery = "SELECT * FROM users_table WHERE user_email = '$userEmail'";

    $resultOfQuery = $connectNow->query($sqlQuery);

    if ($resultOfQuery->num_rows > 0) {
        echo json_encode(array("emailFound" => true));
    } else {
        echo json_encode(array("emailFound" => false));
    }
} else {
    // Handle the case where 'user_email' key is not present
    echo json_encode(array("error" => "user_email key not found"));
}
?>
