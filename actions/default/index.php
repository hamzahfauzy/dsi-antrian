<?php

Page::set_title('Dashboard');

$conn = conn();
$db   = new Database($conn);

$data = [
    'pos' => $db->exists('pos'),
    'services' => $db->exists('services'),
    'queues_wait' => $db->exists('queues',['status'=>'menunggu']),
    'queues_called' => $db->exists('queues',['status'=>'selesai']),
];

return compact('data');