const express = require('express');
const http = require('http');
const socketIo = require('socket.io');
const path = require('path');
const os = require('os');
const ni = os.networkInterfaces();
const port = 7777;

const app = express();
const server = http.createServer(app);
const io = socketIo(server);
module.exports = io;

// Middleware untuk menghidangkan berkas statis dari folder "public"
app.use(express.static(path.join(__dirname, 'public')));

app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, 'public', 'ine.html'));
});

server.listen(port, () => {
    console.log(`dah nyala ${port}!!`);
});