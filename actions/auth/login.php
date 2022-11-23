<?php

$success_msg = get_flash_msg('success');
$error_msg = get_flash_msg('error');
$conn  = conn();
$db    = new Database($conn);

if(request() == 'POST')
{

    $user = $db->single('users',[
        'username' => $_POST['username'],
        'password' => md5($_POST['password']),
    ]);

    if($user)
    {
        $session_param = ['user_id'=>$user->id];
        if(!empty($_POST['pos']))
        {
            $session_param['pos'] = $_POST['pos'];
        }
        Session::set($session_param);
        header('location:'.routeTo(config('after_login_page')));
        die();
    }

    set_flash_msg(['error'=>'Login Gagal! Nama Pengguna atau Kata Sandi tidak cocok']);
    header('location:'.routeTo('auth/login'));
    die();
}

$pos = $db->all('pos');

return [
    'pos' => $pos,
    'success_msg' => $success_msg,
    'error_msg' => $error_msg,
];