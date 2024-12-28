<?php
// check HTTP request method
if($_SERVER['REQUEST_METHOD'] !== 'PUT'){
    header("Allow: PUT");
    http_response_code(405);
    echo json_encode(
        array('message' => 'Method not allowed')
    );
    return;
}

// set HTTP response header
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');

// include database and model files
include_once '../db/Database.php';
include_once '../models/Bookmark.php';

// instantiate database and connect
$database = new Database();
$dbConnection = $database->connect();

// instantiate a Bookmark object
$bookmark = new Bookmark($dbConnection);

// GET the HTTP PUT request JSON body
$data = json_decode(file_get_contents("php://input"));


if(!$data || !$data->id || !$data->title || !$data->link){
    http_response_code(422);
    echo json_encode(
        array('message' => 'missing required parameter(s) id or title or link in the JSON body')
    );
    return;
}

// update the bookmark item
$bookmark->setId($data->id);
$bookmark->setTitle($data->title);
$bookmark->setLink($data->link);
if($bookmark->update()){
    echo json_encode(
        array('message' => 'Todo item updated')
    );
}else{
    echo json_encode(
        array('message' => 'Todo item not updated')
    );
}
