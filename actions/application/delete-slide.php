<?php

$conn = conn();
$db   = new Database($conn);

$data = $db->single('application');

$db->update('application',[
    'video_slide' => ''
],[
    'id' => $data->id
]);

set_flash_msg(['success'=>'Videl slide berhasil dihapus']);
header('location:'.routeTo('application/index'));
die();