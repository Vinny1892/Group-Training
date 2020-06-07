const fs = require('fs');
const express = require('express')
const app = express();
let https = require('https');
const csp = require('helmet-csp')

app.use(csp({
    directives: {
      defaultSrc: ["'self'"],
      styleSrc: ["'self'", 'maxcdn.bootstrapcdn.com']
    }
  }))
  let http = require('http').Server(app);



// let options = {
//     key: fs.readFileSync('server.key','utf8'),
//     cert: fs.readFileSync('server.cert','utf8'),
//     requestCert: false,
//     rejectUnauthorized: false,
// };

//let server = https.createServer(options,app);
const io = require('socket.io').listen(http);

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
io.set("transports", ["xhr-polling","websocket","polling", "htmlfile"]);

http.listen("4000" , ()=>{
    console.log("API CHAT up on port 4000")
})