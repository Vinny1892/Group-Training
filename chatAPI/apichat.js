const app = require('express')();

const server = require('http').createServer(app);
const io = require('socket.io')(server);


io.on('connection' , socket => {
    let messages = [];


    console.log(`Socket connectado ${socket.id}`);

    socket.emit('PreviousMessage' , 'Teste');

    socket.on('sendMessage' , data => {
        console.log("mezagi mermão: ", data);
        messages.push(data);
        socket.broadcast.emit('ReceivedMessage' , data);

    });

  
});

server.listen("3000" , ()=>{
    console.log("API CHAT up on port 3000")
})
