<?php

$conn = conn();
$db   = new Database($conn);
$id   = $_GET['id'];
$db->update('queues',[
    'status' => 'selesai',
    'updated_at' => date('Y-m-d H:i:s')
],[
    'id' => $id
]);

set_flash_msg(['success'=>'Antrian telah selesai di layani']);
header('location:'.routeTo('queues/index'));
die();