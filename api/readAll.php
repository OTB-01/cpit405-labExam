<?php
// check HTTP request method
if($_SERVER['REQUEST_METHOD'] !== 'GET'){
    header("Allow: GET");
    http_response_code(405);
    echo json_encode(
        array('message' => 'Method not allowed')
    );
    return;
}

// set HTTP response header
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');

// include database and model files
include_once '../db/database.php';
include_once '../models/Bookmark.php';

// instantiate database and connect
$database = new Database();
$dbConnection = $database->connect();

// instantiate a Bookmark object
$bookmark = new Bookmark($dbConnection);

// read all bookmarks
$result = $bookmark->readAll();

if(!empty($result)) {
    echo json_encode($result);
}
else {
    echo json_encode(
        array('message' => 'No Todo items found')
    );
}
