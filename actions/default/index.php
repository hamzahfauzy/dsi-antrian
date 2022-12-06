<?php

Page::set_title('Dashboard');

$conn = conn();
$db   = new Database($conn);

$data = [
    'pos' => $db->exists('pos'),
    'services' => $db->exists('services'),
    'queues_wait' => $db->exists('queues',['status'=>'menunggu']),
    'queues_wait_today' => $db->exists('queues',['status'=>'menunggu','created_at'=>['LIKE','%'.date('Y-m-d').'%']]),
    'queues_called' => $db->exists('queues',['status'=>'selesai']),
    'queues_called_today' => $db->exists('queues',['status'=>'selesai','created_at'=>['LIKE','%'.date('Y-m-d').'%']]),
];

return compact('data');