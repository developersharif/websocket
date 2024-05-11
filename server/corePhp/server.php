<?php

// Define constants for server address and port
define('address', '127.0.0.1');
define('port', 8000);
define('serverMessage', 'Hello from server');

/**
 * Initializes and runs a socket server.
 *
 * @param string $address IP address where the server will bind.
 * @param int $port Port number on which the server will listen.
 * @param string|null $serverMessage Optional message to send to the client.
 */
function socket_server($address, $port, $serverMessage = null) {
    // Step 1: Create a socket using IPv4, streaming sockets, and the TCP protocol
    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

    // Step 2: Bind the socket to the specified IP address and port
    socket_bind($socket, $address, $port);

    // Step 3: Listen for incoming client connections
    socket_listen($socket);

    // Step 4: Accept a client connection
    $client = socket_accept($socket);

    // Send the server message to the client
    socket_write($client, $serverMessage, strlen($serverMessage));

    // Output data received from the client
    echo socket_read($client, 1024);

    // Step 5: Close both client and server sockets
    socket_close($client);
    socket_close($socket);
}

// Execute the socket server function with predefined constants
socket_server(address, port, serverMessage);