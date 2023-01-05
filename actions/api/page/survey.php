<?php

$conn = conn();
$db   = new Database($conn);

$survey_questions = $db->all('survey_questions');

return compact('survey_questions');