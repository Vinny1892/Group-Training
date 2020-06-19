require('dotenv').config()
const express = require('express')
const app = express()
let http = require('http').createServer(app)
const io = require('socket.io')(http)

let rooms = []

let room = {
    id: "5eebe0182c289d4996187d24",
    name: "batata",
    public: "teste",
    modalidade: "merda nenhuma",
    description: "sem descrip",
    namespc: io.of(`/5eebe0182c289d4996187d24`),
    messages: [],
}

rooms.push(room)

for (room of rooms) {
    setRoomEvents(room)
}

io.on("connection", socket => {
    socket.on("roomCreated", data => {
        console.log("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
    })
})

function setRoomEvents(room) {
    room.namespc.on('connection', socket => {

        console.log(`Sala ${room.name} conectada!`)

        socket.emit('previousMessage', room.messages);

        socket.on('sendMessage', data => {
            console.log(`Mensagem ${data.message} enviada para sala ${room.name}`)
            room.messages.push(data)
            socket.broadcast.emit('ReceivedMessage', data)
        })
    })
}
    
http.listen("4000" , ()=>{
    console.log("API CHAT up on port 4000")
})
