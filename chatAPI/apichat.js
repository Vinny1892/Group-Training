const app = require('express')();

const server = require('http').createServer(app);
const io = require('socket.io')(server);

let messages = [];

io.on('connection' , socket => {
    
    console.log(`Socket connectado ${socket.id}`);

    socket.emit('PreviousMessage' , messages);

    socket.on('sendMessage' , data => {
        console.log("mezagi mermão: ", data);
        messages.push(data);
        socket.broadcast.emit('ReceivedMessage' , data);
    });
});

server.listen("3000" , ()=>{
    console.log("API CHAT up on port 3000")
})