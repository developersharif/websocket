# WebSocket Examples for Learning and Practice

This repository provides a comprehensive set of examples to help you learn and practice using WebSockets in different PHP environments. Whether you're new to WebSockets or looking to expand your knowledge, these examples cover a range of scenarios from basic to advanced implementations.

<a href="https://datatracker.ietf.org/doc/html/rfc6455">WebSocket Protocol (RFC 6455)</a>: Understand the foundational protocol that defines how data is exchanged between the network and the client, initiating with an HTTP handshake that upgrades to a WebSocket connection.

<a href="https://datatracker.ietf.org/doc/html/rfc1180">RFC 1180 - A TCP/IP Tutorial</a>: This RFC provides a beginner-friendly introduction to TCP/IP networking concepts, including protocols like TCP and UDP, IP addressing, and packet routing. It serves as a useful primer for understanding how sockets fit into the broader networking landscape.

<a href="https://datatracker.ietf.org/doc/rfc2616/">RFC 2616 - Hypertext Transfer Protocol (HTTP/1.1)</a>: While not directly related to sockets, this RFC defines the HTTP protocol commonly used for web communication. Many PHP socket applications involve interacting with web servers or implementing web services, making an understanding of HTTP beneficial.

<a href="https://developer.mozilla.org/en-US/docs/Web/API/WebSocket">JavaScript WebSocket API</a>: Learn how to implement WebSockets on the client side using the WebSocket API available in modern web browsers. Explore how to open, manage, send, and receive data through the WebSocket connection.

<a href="https://www.php.net/manual/en/ref.sockets.php">PHP Socket Functions</a>: For specific information about PHP socket functions and classes, refer to the PHP manual or online tutorials and guides dedicated to PHP socket programming. These resources typically cover topics such as creating and managing sockets, establishing connections, sending and receiving data, and handling errors and timeouts.

## HOW WEB SOCKET WORKS? (client(Browser)->server)

Websocket works by making a connection between client and server. In order to start the connection, clients sends a http GET request with a <b>upgrade header</b>, so that the server know that this is a upgrade request and it responds with <b>status 101</b> if the server supports the upgrade properties and return error code if not.

If any code other than 101 is returned from the server, Clients has to end the connection.

Websockets are consider as they make a single connection between client and server and there is no overhead of making those handshakes with the server every time we have to communicate.

#### Client side request headers look like this:

![image](https://github.com/developersharif/websocket/assets/54396379/ba544078-a50a-41ef-835d-25d9d86a50db)

<a href="https://vishalrana9915.medium.com/understanding-websockets-in-depth-6eb07ab298b3">Blog reference at medium</a>

## Examples

### <a href="https://github.com/developersharif/websocket/tree/main/server/corePhp">Core PHP WebSocket Example</a>

Get started with the fundamentals of using raw PHP to create WebSocket servers and clients. Ideal for understanding the <b>low-level mechanics</b> of WebSocket communication.

### Ratchet WebSocket Implementation <sup><small>Coming soon...</small></sup>

Dive into the Ratchet package to build more robust WebSocket applications with PHP. This section helps you enhance your applications with a WebSocket protocol.

### Laravel WebSocket Integration

Explore how to integrate WebSockets in a Laravel application using popular packages for real-time data communication. Learn how to leverage Laravel's infrastructure to implement efficient, scalable WebSocket servers.

### Hyperf WebSocket Usage

See how to implement WebSockets within the context of the Hyperf framework for high-performance web applications. This part is perfect for developers looking to use WebSocket technology in high-throughput environments.

## Learning Outcomes

Each section includes step-by-step examples and explanations to ensure you gain practical knowledge and hands-on experience. Perfect for developers interested in real-time web technologies and asynchronous communication in PHP.

## Authors

- [@developersharif](https://www.github.com/developersharif)
