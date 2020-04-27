const app = require('express')();

const server = require('http').createServer(app);
const io = require('socket.io')(server);

let rooms = []

function isRoomCreated(id){
    for(room of rooms){
        if(room.id == id) return true;
    }
    return false;
}

io.sockets.on('connection', function(socket) {

    socket.on('createRoom', roomData => {
        if(!isRoomCreated(roomData.id)){
            let room = {
                id: roomData.id,
                name: roomData.name,
                type: roomData.type,
                description: roomData.description,
                namespc: io.of(`/${roomData.name}`),
                messages: [],
            }
            rooms.push(room)
            console.log("Sala criada: ", room)
        }
    })
    
    socket.on('deleteRoom', roomName => {
        rooms = rooms.filter(data => { return data != roomName })
    })

    for(room of rooms){
        room.messages = [];
        room.namespc.on('connection', socket => {

            console.log(`ID da Sala Conectada: ${room.id}, socket ${socket}`);
    
            socket.emit('previousMessage' , room.messages);
        
            socket.on('sendMessage' , data => {
                room.messages.push(data)
                console.log("Mensagen adicionada a sala: ", data)
                console.log(room.messages)
                socket.broadcast.emit('ReceivedMessage' , data)
            });
        })
    }
})

server.listen("3000" , ()=>{
    console.log("API CHAT up on port 3000")
})