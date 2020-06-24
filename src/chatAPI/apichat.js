require('dotenv').config()
const express = require('express')
const app = express()
let http = require('http').createServer(app)
const io = require('socket.io')(http)
const axios = require('axios');

let rooms = []
startServer()

//Inicia o Servidor
async function startServer() { 
    rooms = await getRooms()
    for (room of rooms) {
        room.namespc = io.of(`/${room.id}`),
        setRoomEvents(room)
    }
}

//Busca as salas no endpoint do LARAVEL
async function getRooms() {
     await axios.get('http://localhost:8085/api/rooms')
            .then(function (response) {
                console.log(response);
                return response
            })
            .catch(function (error) {
                // handle error
                console.log(error);
                return error
            })
}

//Trata eventos gerais, como criação e deleção de salas;
io.on("connection", socket => {
    socket.on("roomCreated", newRoom => { setRoomEvents(newRoom) })
    socket.on("roomDeleted", RoomDeleted => { })
})

//Dita quais eventos cada sala deverá tratar;
function setRoomEvents(room) {
    room.namespc.on('connection', socket => {

        console.log(`Sala ${room.name} conectada!`)

        socket.emit('previousMessage', room.messages);

        socket.on('sendMessage', messageObject => {
            console.log(`Mensagem ${messageObject.message} enviada para sala ${room.name}`)
            room.messages.push(messageObject)
            socket.broadcast.emit('ReceivedMessage', messageObject)
        })
    })
}

http.listen("4000" , ()=>{
    console.log("API CHAT up on port 4000")
})
