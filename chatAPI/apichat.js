const app = require('express')();

const server = require('http').createServer(app);
const io = require('socket.io')(server);

let rooms = []


let room = {
    id: 123123,
    name: "batata",
    public: "teste",
    modalidade: "merda nenhuma",
    description: "sem descrip",
    namespc: io.of(`/123123`),
    messages: [],
}

rooms.push(room)

for(room of rooms){
    room.namespc.on('connection', socket => {
        console.log(`Sala ${room.name} conectada!` )
        
        socket.emit('previousMessage' , room.messages);

        socket.on('sendMessage' , data => {
            console.log(`Mensagem ${data.message} enviada para sala ${room.name}` )
            room.messages.push(data)
            socket.broadcast.emit('ReceivedMessage' , data)
        });
    })
}

server.listen("3000" , ()=>{
    console.log("API CHAT up on port 3000")
})