<?php

require 'vendor/autoload.php';

Predis\Autoloader::register();

// $client = new Predis\Client();
// $client = new Predis\Client('tcp://redis:6379');
$client = new Predis\Client([
    'scheme' => 'tcp',
    'host'   => 'redis',
    'port'   => 6379,
]);

$client->set('foo', 'bar');
$value = $client->get('foo');

echo $value . PHP_EOL;
