# PHP Socket Server Example

This script demonstrates the core principles of socket programming in PHP, including creating, binding, listening, accepting, and handling sockets with IPv4 and TCP.

## Features

- **Easy Configuration**: Uses constants to define server settings.
- **Commented Steps**: Each step in the socket lifecycle is clearly commented to enhance understanding.
- **Dynamic Messaging**: Send custom messages from the server to the client.

## Getting Started

To run this PHP socket server, you'll need:

- PHP 7.0 or higher
- Command line access to a system with PHP installed
- Basic understanding of socket programming

### Setup Instructions

1. **Clone the repository**

   ```bash
   git clone https://github.com/developersharif/websocket.git

   ```

2. **Navigate to the project directory**
   ```bash
   cd websocket
   ```
3. **Run the server script**
   ```bash
   php -f server/corePhp/server.php
   ```
4. **Run the client script**
   ```bash
   php -f server/corePhp/client.php
   ```
![2024-05-11_14-16](https://github.com/developersharif/websocket/assets/54396379/031223dd-002c-4c91-b013-aa9a91070b81)

## How It Works

Here’s a brief rundown of the code mechanics:

<li>Initialization: The server address and port are set via constants.
Socket Creation: A TCP/IP socket is created using socket_create().</li>
<li>Binding: The socket is bound to an IP address and port.</li>
<li>Listening: The script listens for connections.</li>
<li>Connection Handling: Accepts connections and handles incoming and outgoing messages.</li>
<li>Closure: Both client and server sockets are closed cleanly.</li>

#### **server.php**

```php
// Define constants for server address and port
define('address', '127.0.0.1');
define('port', 8000);
define('serverMessage', 'Hello from server');


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
```

#### client.php

```php
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

```

### Usage

This script can be modified to test different server configurations or as a starting point for more complex socket-based server applications.
