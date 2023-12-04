const express = require('express');
const http = require('http');
const socketIo = require('socket.io');
const cors = require('cors');

const app = express();
const server = http.createServer(app);

// Enable CORS for your CodeIgniter origin
const corsOptions = {
  origin: 'https://localhost/testing/ci_socket',
  methods: ['GET', 'POST'],
  credentials: true,
};

app.use(cors(corsOptions));

const io = socketIo(server);

io.on('connection', (socket) => {
  console.log('A user connected');

  socket.on('message', (data) => {
    console.log('Message from client:', data);

    // Broadcast the message to all connected clients
    io.emit('message', data);
  });

  socket.on('disconnect', () => {
    console.log('User disconnected');
  });

  socket.handshake.headers.origin = 'https://localhost/testing/ci_socket';

});

const PORT = process.env.PORT || 8080;
server.listen(PORT, () => {
  console.log(`Socket.IO server is running on port ${PORT}`);
});
