<?php

use Factory\TransportFactory;
use Service\TransportCSVFileParser;

spl_autoload_register(function ($className) {
    include __DIR__ . '/' . str_replace('\\', '/', $className) . '.php';
});

$env = parse_ini_file('.env');
$transportDTOList = (new TransportCSVFileParser())->parse($env['SOURCE_CSV_FILE']);
$transportList = (new TransportFactory())->createAllTransport($transportDTOList);

foreach ($transportList as $transport) {
    echo $transport . '<br>';
}
