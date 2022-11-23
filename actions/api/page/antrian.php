<?php

$conn = conn();
$db   = new Database($conn);

$services = $db->all('services');

return compact('services');