<?php
error_reporting(E_ALL);

echo 'TCP/IP Connection' . PHP_EOL;

/* Get the port for the WWW service. */
$service_port = getservbyname('www', 'tcp');

/* Get the IP address for the target host. */
$address = gethostbyname('www.google.com');

/* Create a TCP/IP socket. */
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if ($socket === false) {
    echo 'socket_create() failed: reason: ' . socket_strerror(socket_last_error()) . PHP_EOL;
} else {
    echo 'OK.' . PHP_EOL;
}

/* Connect to socket */
echo "Attempting to connect to '$address' on port '$service_port'...\n";
$result = socket_connect($socket, $address, $service_port);
if ($result === false) {
    echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . PHP_EOL;
} else {
    echo 'OK.' . PHP_EOL;
}

/* Send response */
echo 'Sending HTTP HEAD request...' . PHP_EOL;

$in = "HEAD / HTTP/1.1\r\n";
$in .= "Host: www.google.com\r\n";
$in .= "Connection: Close\r\n\r\n";
socket_write($socket, $in, strlen($in));
echo 'OK.' . PHP_EOL;

/* Read response */
echo 'Reading response:' . PHP_EOL;

$out = '';
while ($out = socket_read($socket, 2048)) {
    echo $out;
}

/* Close socket */
echo 'Closing socket...' . PHP_EOL;
socket_close($socket);
echo 'OK.' . PHP_EOL;
