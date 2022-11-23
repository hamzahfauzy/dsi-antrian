<?php
if (!in_array(php_sapi_name(),["cli","cgi-fcgi"])) {
    die();
}

use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

$connector = new WindowsPrintConnector(config('printer_name'));
$printer = new Printer($connector);
// $printer -> text("Hello World!\n\n\n\n\n");
// $printer -> cut();
// $printer -> close();

$conn = conn();
$db   = new Database($conn);

$queues = $db->all('queues',['is_print'=>0]);
