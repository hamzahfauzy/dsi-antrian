<?php

$conn = conn();
$db   = new Database($conn);

$data = $db->single('application');
$success_msg = get_flash_msg('success');
$error_msg = get_flash_msg('error');

if(request() == 'POST')
{
    if(isset($_FILES['file']) && !empty($_FILES['file']['name']))
    {
        Validation::run([
            'file' => [
                'required','file','mime:mp4'
            ]
        ], $_FILES);
        
        $_POST['app']['video_slide'] = do_upload($_FILES['file'], 'uploads/screen_savers');
    }

    if(isset($_FILES['background_image']) && !empty($_FILES['background_image']['name']))
    {
        Validation::run([
            'background_image' => [
                'required','file','mime:jpg,png,jpeg'
            ]
        ], $_FILES);
        
        $_POST['app']['background_image'] = do_upload($_FILES['background_image'], 'uploads/screen_savers');
    }

    $db->update('application',$_POST['app'],[
        'id' => $data->id
    ]);

    set_flash_msg(['success'=>'Detail Aplikasi berhasil diupdate']);
    header('location:'.routeTo('application/index'));
    die();
}

return compact('data','success_msg','error_msg');