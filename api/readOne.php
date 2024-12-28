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
include_once '../db/Database.php';
include_once '../models/Bookmark.php';

// instantiate database and connect
$database = new Database();
$dbConnection = $database->connect();

// instantiate a Bookmark object
$bookmark = new Bookmark($dbConnection);


// get the HTTP GET query parameters
if(!isset($_GET['id'])){
    http_response_code(422);
    echo json_encode(
        array('message' => 'Error missing required query parameter id.')
    );
    return; 
}


$bookmark->setId($_GET['id']);
if($bookmark->readOne()){
    $result = array(
        'id' => $bookmark->getId(),
        'title' => $bookmark->getTitle(),
        'link' => $bookmark->getLink(),
        'date_added' => $bookmark->getDateAdded()
    );
    echo json_encode($result);
}
else{
    http_response_code(404);
    echo json_encode(
        array('message' => 'Error: no such bookmark')
    );
}