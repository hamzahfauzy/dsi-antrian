<?php

$conn = conn();
$db   = new Database($conn);

$services = $db->all('services');
$slides = $db->all('screen_savers');

return compact('services','slides');