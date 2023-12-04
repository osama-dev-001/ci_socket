var socket = require('socket.io');
var cors = require('cors');
var express = require('express');
var app = express();
var server = require('http').createServer(app);
var io = socket(server); // Change this line
var port = process.env.PORT || 8080;
// app.use(cors);

app.use(cors({
    origin: 'http://192.168.1.4:8080', // Allow requests from this origin
    methods: 'GET,HEAD,PUT,PATCH,POST,DELETE',
    credentials: true, // Allow credentials (cookies, etc.)
    optionsSuccessStatus: 204, // No content response for preflight requests
}));
// server.listen(8080);

server.listen(port, function () {
    console.log('Server listening at port %d', port);
});
io.on('connection', function (socket) {
    socket.on('new_message', function (data) {
        io.sockets.emit('new_message', {
            message: data.message,
            date: data.date,
            msgcount: data.msgcount
        });
    });
});
