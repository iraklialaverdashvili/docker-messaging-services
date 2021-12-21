<?php

$client = new Memcached();
$client->addServer('memcached', 11211);

$response = $client->get('foo');
if ($response) {
    echo $response . PHP_EOL;
} else {
    echo 'Creating cache...' . PHP_EOL;
    $client->set('foo', 'bar') or die('Can\t set foo!');
}
