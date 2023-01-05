<?php

$conn = conn();
$db   = new Database($conn);
$question = $db->single('survey_questions',['id'=>$_POST['question_id']]);

$db->insert('survey',[
    'question' => $question->question,
    'result'   => $_POST['result']
]);

echo json_encode([
    'status' => 'success',
]);
die();