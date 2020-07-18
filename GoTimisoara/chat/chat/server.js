const express = require('express'); 
const chat = express();
const http = require('http').Server(chat);
const io = require('socket.io')(http);
const path = require('path');

chat.use(express.static(path.join(__dirname, 'public')));

chat.get('/', (req,res) => {
    res.sendFile(path.join(__dirname, 'public', 'chat.html'));
});

io.on('connection', (socket) => {
    console.log('utilizator conectat');

    socket.on('disconnect' , () =>{
        console.log('utilizator deconectat');
    });

    socket.on('message', (message) => {
        console.log('message', message);
        //acum trimitem broadcast la toti cei care asculta pe portul respectiv si sunt conectati
        io.emit('message', message);
    });
});

http.listen(3000, () =>{
    console.log('listening on 3000, path: ' + __dirname);
});