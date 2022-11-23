<?php

$nop = $_GET['nop'];
$tahun = isset($_GET['year']) ? '&year='.$_GET['year'] : '';
$request = simple_curl('http://103.15.243.147:81/app/api/v1/check?nop='.$nop.$tahun);

$data = json_decode($request['content']);

return compact('data');
