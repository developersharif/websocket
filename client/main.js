// Initialize a WebSocket connection.

// Establish a WebSocket connection to the specified URL.
let socket = new WebSocket('ws://127.0.0.1:9000/');

// Event handler when the WebSocket connection is established.
socket.onopen = function() {
    console.log("WebSocket connection opened");
};

// Event handler for receiving messages from the server.
socket.onmessage = function(event) {
    console.log("Received message from server: " + event.data);
};

// Event handler when the WebSocket connection is closed.
socket.onclose = function() {
    console.log("WebSocket connection closed");
};
