<?php

use Factory\TransportFactory;
use Service\TransportCSVFileParser;

require 'vendor/autoload.php';

$env = parse_ini_file('.env');
$transportDTOList = (new TransportCSVFileParser())->parse($env['SOURCE_CSV_FILE']);
$transportList = (new TransportFactory())->createAllTransport($transportDTOList);

foreach ($transportList as $transport) {
    echo $transport . '<br>';
}
