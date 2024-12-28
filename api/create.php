<?php
// check HTTP request method
if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    header("Allow: POST");
    http_response_code(405);
    echo json_encode(
        array('message' => 'Method not allowed')
    );
    return;
}

// set HTTP response header
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');

// include database and model files
include_once '../db/Database.php';
include_once '../models/Bookmark.php';

// instantiate database and connect
$database = new Database();
$dbConnection = $database->connect();

// instantiate a Bookmark object
$bookmark = new Bookmark($dbConnection);

// Get the HTTP POST request JSON body
$data = json_decode(file_get_contents("php://input"), true);

// if no bookmark is included in the json body, return error
if(!$data || !isset($data['title']) || !isset($data['link'])) {
    http_response_code(422);
    echo json_encode(
        array('message' => 'Error missing required parameter in the JSON body. Please include a title and link')
    );
    return;
}

// create a bookmark item
$bookmark->setTitle($data['title']);
$bookmark->setLink($data['link']);
if($bookmark->create()) {
    echo json_encode(
        array('message' => 'A Bookmark item created')
    );
} else {
    echo json_encode(
        array('message' => 'Error no Bookmark was created')
    );
}


