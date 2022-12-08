<?php

$conn = conn();
$db   = new Database($conn);

$data = $db->single('application');

$db->update('application',[
    'background_image' => ''
],[
    'id' => $data->id
]);

set_flash_msg(['success'=>'Background berhasil dihapus']);
header('location:'.routeTo('application/index'));
die();