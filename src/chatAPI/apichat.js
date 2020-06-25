require('dotenv').config()
const express = require('express')
const app = express()
let http = require('http').createServer(app)
const io = require('socket.io')(http)
const axios = require('axios');


startServer()

//Inicia o Servidor
async function startServer() { 
    let rooms = await getRooms()
    if(rooms != undefined){
        for (room of rooms) {
            setRoomEvents(room)
        }
    }else{
        console.log("\r\nNão existem salas para serem carregadas!")
    }
}

//Busca as salas no endpoint do LARAVEL
async function getRooms() {
    let resp = await axios.get('http://172.100.0.10/api/rooms')

    return resp.data.rooms
}

//Trata eventos gerais, como criação e deleção de salas;
io.on("connection", socket => {
    socket.on("roomCreated", newRoom => {
        let room = newRoom.itemSaved;
        setRoomEvents(room) 
    })
    socket.on("roomDeleted", RoomDeleted => {})
})


//Dita quais eventos cada sala deverá tratar;
async function setRoomEvents(room) {
    room.namespc = io.of(`/${room._id}`) 
    room.messages = []


    await room.namespc.on('connection', socket => {

        console.log(`Um usuario se conectou a sala ${room._id}`)

        socket.emit('previousMessage', room.messages);

        socket.on('sendMessage', messageObject => {
            console.log(`Mensagem ${messageObject.message} enviada para sala ${room._id}`)
            room.messages.push(messageObject)
            socket.broadcast.emit('ReceivedMessage', messageObject)
        })
    })
}

http.listen("4000" , ()=>{
    console.log("API CHAT escutando na porta 4000")
})
