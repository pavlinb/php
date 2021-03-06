<?php
header('Content-Type: application/json');

const ACTIONS = ["move","eat","load","unload"];
const DIRECTIONS = ["up","down","right","left"];

$response = array();

$payload = file_get_contents("php://input");

//Hive object from request payload
$hive = json_decode($payload,true);

//Loop through ants and give orders
foreach ($hive["ants"] as $antId => $ant){
    $response[$antId] = array(
        "act"=>ACTIONS[rand(0,3)],
        "dir"=>DIRECTIONS[rand(0,3)]
    );
}

echo json_encode($response);

// json format sample:
// {"1":{"act":"load","dir":"down"},"17":{"act":"load","dir":"up"}}
?>