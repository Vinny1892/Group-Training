let button = document.querySelector("#btn_send_chat")
let chat = document.querySelector("#chat")
let user = JSON.parse(document.querySelector("#user").getAttribute('value').toString())
let field = document.getElementById("contentMessage")

let socket = io(`${domainWS}:4000/${roomID}`);

socket.on("ReceivedMessage", function(message){
    //construir tela chat
    //mensagem recebida
    renderMessage(message , 'outro')
})

socket.on('previousMessage', function(messages){
    let type
    if(messages != undefined) {
        for(message of messages){
            type = message.id == user._id ? "eu" : "outro"
            renderMessage(message, type)
        }
    }
})

function sendMessage() {
    let message = document.querySelector("#contentMessage")
    let messageObject = {
        author: user.name,
        id: user._id,
        message: message.value,
        time: new Date().toLocaleTimeString()
    }

    // caso a mensagem não esteja vazia ou cheia de espaços em branco,
    // ele emite o evento, renderiza na tela e limpa o campo
    if (message.value.trim() != "") {
        socket.emit('sendMessage', messageObject)
        renderMessage(messageObject, "eu")
        message.value = ""
    }
}

function renderMessage(messageObject, type){
    
    let newMessageBox = document.createElement("div")
    
    //type = "eu" para adicionar mensagens do seu usuário
    //type = "outro" para adicionar mensagens de outros usuarios
    
    if(type == "eu") {
        const myUserMessage = `
        <div class='eu'>
            <div class='message'>
                <span class='message-text'>${messageObject.message}</span>
            </div>
            <span class='horario'>${messageObject.time}</span>
        </div>
        `
        newMessageBox.innerHTML =  myUserMessage;

    } else {
        const otherUserMessage = `
        <div class='outro'>
            <div class='message'>
                <span class='name'>${messageObject.author}</span>
                <span class='message-text'>${messageObject.message}</span>
            </div>
            <span class='horario'>${messageObject.time}</span>
        </div>
        `
        newMessageBox.innerHTML =  otherUserMessage;
    }

    chat.appendChild(newMessageBox.children[0]);

    chat.scrollTop = chat.scrollHeight;    
}

button.addEventListener('click', async function () {
    sendMessage()
})

field.addEventListener("keyup", function (event) {
    if (event.keyCode === 13) sendMessage()
})