# Socket Server in C with Example

This script demonstrates the core principles of socket programming in c, including creating, binding, listening, accepting, and handling sockets with IPv4 and TCP.

## Features

- **Easy Configuration**: Uses constants to define server settings.
- **Commented Steps**: Each step in the socket lifecycle is clearly commented to enhance understanding.
- **Dynamic Messaging**: Send custom messages from the server to the client.

## Getting Started

To run this socket server and client, you'll need:

- A C compiler (e.g., GCC)
- Command line access to a system with the C compiler installed
- Basic understanding of socket programmingsocket programming

### Setup Instructions

1. **Clone the repository**

   ```bash
   git clone https://github.com/developersharif/websocket.git

   ```

2. **Navigate to the project directory**
   ```bash
   cd websocket
   ```
3. **Compile the server script**
   ```bash
   gcc server.c -o server
   ```
4. **Compile the client script**

   ```bash
   gcc client.c -o client
   ```

5. **Run the Server script**
   ```bash
   ./server
   ```
6. **Run the client script**
   ```bash
   ./client
   ```
![socketServerinc](https://github.com/developersharif/websocket/assets/54396379/4995dea6-6d35-4ae1-96c7-a7a5902f7b3b)

## How It Works

Here's a brief rundown of the code mechanics:

<li>Initialization: The server address and port are set via constants.</li>
<li>Socket Creation: A TCP/IP socket is created using the socket function.</li>
<li>Binding: The socket is bound to an IP address and port using the bind function.</li>
<li>Listening: The script listens for connections using the listen function.</li>
<li>Connection Handling: Accepts connections using the accept function and handles incoming and outgoing messages using read and send functions.</li>
<li>Closure: Both client and server sockets are closed cleanly using the close function.</li>

#### **server.c**

```c
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <sys/socket.h>
#include <arpa/inet.h>
#include <unistd.h>

#define PORT 8000

int main() {
    int server_fd, new_socket, valread;
    struct sockaddr_in address;
    int opt = 1;
    int addrlen = sizeof(address);
    char buffer[1024] = {0};

    // Creating socket file descriptor
    if ((server_fd = socket(AF_INET, SOCK_STREAM, 0)) == 0) {
        perror("socket failed");
        exit(EXIT_FAILURE);
    }

    // Forcefully attaching socket to the port 8080
    if (setsockopt(server_fd, SOL_SOCKET, SO_REUSEADDR | SO_REUSEPORT, &opt, sizeof(opt))) {
        perror("setsockopt");
        exit(EXIT_FAILURE);
    }

    address.sin_family = AF_INET;
    address.sin_addr.s_addr = INADDR_ANY;
    address.sin_port = htons(PORT);

    // Forcefully attaching socket to the port 8080
    if (bind(server_fd, (struct sockaddr *)&address, sizeof(address)) < 0) {
        perror("bind failed");
        exit(EXIT_FAILURE);
    }

    if (listen(server_fd, 3) < 0) {
        perror("listen");
        exit(EXIT_FAILURE);
    }

    printf("Server is running on port %d\n", PORT);

    while (1) {
        if ((new_socket = accept(server_fd, (struct sockaddr *)&address, (socklen_t *)&addrlen)) < 0) {
            perror("accept");
            exit(EXIT_FAILURE);
        }

                // Send a response back to the client
        send(new_socket, "Hello from the server", 21, 0);
        printf("Response sent to the client\n");

        valread = read(new_socket, buffer, 1024);
        printf("Received message: %s\n", buffer);


        // Close the connection with the client
        close(new_socket);
    }

    return 0;
}
```

#### client.c

```c
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <sys/socket.h>
#include <arpa/inet.h>
#include <unistd.h>

#define PORT 8000

int main() {
    int sock = 0;
    struct sockaddr_in serv_addr;
    char buffer[1024] = {0};
    int valread; // Declare valread variable

    // Create a socket file descriptor
    if ((sock = socket(AF_INET, SOCK_STREAM, 0)) < 0) {
        printf("Socket creation error\n");
        return -1;
    }

    memset(&serv_addr, '0', sizeof(serv_addr));

    serv_addr.sin_family = AF_INET;
    serv_addr.sin_port = htons(PORT);

    // Convert IPv4 and IPv6 addresses from text to binary form
    if (inet_pton(AF_INET, "127.0.0.1", &serv_addr.sin_addr) <= 0) {
        printf("Invalid address / Address not supported\n");
        return -1;
    }

    // Connect to the server
    if (connect(sock, (struct sockaddr *)&serv_addr, sizeof(serv_addr)) < 0) {
        printf("Connection failed\n");
        return -1;
    }

    printf("Connected to server\n");

    // Send a message to the server
    char *message = "Hello from client";
    send(sock, message, strlen(message), 0);
    printf("Message sent: %s\n", message);

    // Receive a response from the server
    valread = read(sock, buffer, 1024); // Use the declared valread variable
    printf("Response from server: %s\n", buffer);

    // Close the socket
    close(sock);

    return 0;
}

```

### Note

Note: The provided code is a basic example and does not include error handling or other features required for production-level applications.
