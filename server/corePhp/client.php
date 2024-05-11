<?php
// Establish a connection to a socket server.

// Define server IP and port for connection
$serverIP = '127.0.0.1';
$port = 8000;
$clientMessage = 'Hello from client';

/**
 * Step 1: Create a TCP/IP socket.
 */
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

/**
 * Step 2: Connect to the server using the created socket.
 */
socket_connect($socket, $serverIP, $port);

/**
 * Receive a message from the server.
 * Reads data sent from the server.
 */
$serverMessage = socket_read($socket, 1024);
echo $serverMessage;

/**
 * Send a message to the server.
 * Writes the client's message to the socket.
 */
socket_write($socket, $clientMessage, strlen($clientMessage));

/**
 * Close the socket connection.
 */
socket_close($socket);