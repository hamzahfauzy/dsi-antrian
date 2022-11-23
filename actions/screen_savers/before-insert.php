<?php

Validation::run([
    'file' => [
        'required','file','mime:jpg,png,jpeg'
    ]
], $_FILES);

$_POST['screen_savers']['file'] = do_upload($_FILES['file'], 'uploads/screen_savers');