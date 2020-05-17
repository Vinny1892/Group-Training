
let rooms = io('localhost:3000')

socket = io('localhost:3000/123123')

let button = document.querySelector("#btn_send_chat")
let chat = document.querySelector("#chat")
let user = JSON.parse(document.querySelector("#user").getAttribute('value').toString())
let room = JSON.parse(document.querySelector("#room").getAttribute('value').toString())


socket.on("ReceivedMessage", function(message){
    //construir tela chat
    //mensagem recebida
    renderMessage(message , 'outro')
})

socket.on('previousMessage', function(messages){
    let type
    for(message of messages){
        type = message.id == user._id ? "eu" : "outro"
        renderMessage(message, type)
    }
})


button.addEventListener ('click', async function(){
    let message = document.querySelector("#contentMessage")

    let messageObject = {
        author: user.name,
        id: user._id,
        message: message.value,
        time: new Date().toLocaleTimeString()
    }

    // caso a mensagem não esteja vazia ou cheia de espaços em branco,
    // ele emite o evento, renderiza na tela e limpa o campo
    if(message.value.trim() != ""){
        socket.emit('sendMessage' , messageObject)
        renderMessage(messageObject, "eu")
        message.value = ""
    }

});


function renderMessage(messageObject, type){
    let newMessageBox = document.createElement("div")
    let tabulacao = document.createElement("span")
    let newMessageText = document.createElement("span")
    let newMessageTime = document.createElement("span")
    
    //type = "eu" para adicionar mensagens do seu usuário
    //type = "outro" para adicionar mensagens de outros usuarios
    newMessageBox.classList.add(type)

    newMessageTime.classList.add("horario")
    newMessageText.innerText = messageObject.message
    newMessageTime.innerText = messageObject.time

    if(type == "outro") {
        let newMessageAuthor = document.createElement("div")
        newMessageAuthor.classList.add("nome")
        newMessageAuthor.innerText = messageObject.author
        newMessageBox.appendChild(newMessageAuthor)
    }

    newMessageText.classList.add("msg")
    tabulacao.classList.add("tab")

    tabulacao.appendChild(newMessageText)
    newMessageBox.appendChild(tabulacao)
    newMessageBox.appendChild(newMessageTime)
    chat.appendChild(newMessageBox)
}



// mensagem a ser enviada
