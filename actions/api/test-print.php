<?php
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

$connector = new WindowsPrintConnector(config('printer_name'));
$printer = new Printer($connector);
$printer -> setJustification(Printer::JUSTIFY_CENTER);
$printer -> setTextSize(2, 2);
$printer -> text("DINAS PENDAPATAN\n");
$printer -> text("KABUPATEN ASAHAN\n");
$printer -> text("----------------\n");
$printer -> cut();
$printer -> close();

echo json_encode([
    'status' => 'success',
]);
die();