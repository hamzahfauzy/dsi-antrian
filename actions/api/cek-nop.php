<?php

$nop = $_GET['nop'];
$tahun = isset($_GET['tahun']) ? '&tahun='.$_GET['tahun'] : '';
$request = simple_curl('http://103.15.243.147:81/app/api/v1/check?nop='.$nop.$tahun);

echo $request['content'];
die();
