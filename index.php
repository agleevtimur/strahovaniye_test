<?php

use Factory\TransportCSVFileFactory;

include 'transport_types.php';
spl_autoload_register(function ($className) {
    include __DIR__ . '/' . str_replace('\\', '/', $className) . '.php';
});

$factory = new TransportCSVFileFactory('test.csv');

$transportList = $factory->createAllTransport();

foreach ($transportList as $transport) {
    echo $transport . '<br>';
}
