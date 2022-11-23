<?php

$conn = conn();
$db   = new Database($conn);

$slides = $db->all('screen_savers');

echo json_encode([
    'status' => 'success',
    'data' => $slides
]);
die();