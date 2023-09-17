<?php

use Factory\TransportFactory;
use Service\TransportCSVFileParser;

spl_autoload_register(function ($className) {
    include __DIR__ . '/' . str_replace('\\', '/', $className) . '.php';
});

$transportDTOList = (new TransportCSVFileParser())->parse('test.csv');
$transportList = (new TransportFactory())->createAllTransport($transportDTOList);

foreach ($transportList as $transport) {
    echo $transport . '<br>';
}
