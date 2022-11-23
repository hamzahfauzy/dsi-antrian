<?php

$conn = conn();
$db   = new Database($conn);
$service_id  = $_POST['service_id'];
$service = $db->single('services',['id'=>$service_id]);
$last_queues = $db->single('queues',['pos_id'=>$service->pos_id],['id'=>'desc']);
$next = $last_queues ? $last_queues->number+1 : 1;
$db->insert('queues',[
    'pos_id' => $service->pos_id,
    'service_id' => $service->id,
    'number' => $next,
    'status' => 'menunggu'
]);

echo json_encode([
    'status' => 'success'
]);
die();