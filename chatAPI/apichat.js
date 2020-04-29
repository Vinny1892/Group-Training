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


io.sockets.on('connection', function(socket) {
    console.log("SOCKET.IO conectado")

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
            console.log(`Sala ${room.name} criada!`)
            rooms.push(room)
            connectNewRoom(room)
        }
    })
    
    socket.on('deleteRoom', roomName => {
        rooms = rooms.filter(data => { return data != roomName })
    })
    
})

function isRoomCreated(id){
    for(room of rooms){
        if(room.id == id) return true;
    }
    return false;
}

function connectNewRoom(room){
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