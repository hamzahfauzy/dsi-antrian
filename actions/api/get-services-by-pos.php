<?php

$conn = conn();
$db   = new Database($conn);
$pos_id = $_GET['pos_id'];

$services = $db->all('services',[
    'pos_id' => $pos_id
]);

echo json_encode([
    'status' => 'success',
    'data' => $services
]);
die();