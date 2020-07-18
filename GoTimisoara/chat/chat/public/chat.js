const tipMesaj = { LEFT: 'left', RIGHT: 'right', LOGIN: 'login'};

const chatWindow = document.getElementById('chat');
const messagesList = document.getElementById('messagesList');
const messageInput = document.getElementById('messageInput');
const sendButton = document.getElementById('sendButton');

let username = ''; //daca facem form de log-in o sa schimb si chestia asta
const usernameInput = document.getElementById('usernameInput');
const loginButton = document.getElementById('loginButton');
const loginWindow = document.getElementById('login');

const messages = [
]; // fiecare obiect are un autor, data, continut(mesaj in sine), tip

var socket = io();

socket.on('message', message => {
  console.log(message);
  if(message.type !== tipMesaj.LOGIN){
    if(message.author === username){
      message.type = tipMesaj.RIGHT;
    }
    else{
      message.type = tipMesaj.LEFT;
    }
  }
  messages.push(message);
  displayMessages();
  chatWindow.scrollTop = chatWindow.scrollHeight;
});

const createMessageHTML = message => {
  if(message.type === tipMesaj.LOGIN){
    return `
      <p class ="secondary-text text-center mb-2"> ${message.author} a intrat in conversatie.</p>
    `;
  }

  return `
    <div class="message ${message.type === tipMesaj.LEFT ? 'message-left' : 'message-right'}">
      <div class = "message-details flex">
        <p class="flex-grow-1 message-author">${message.type === tipMesaj.RIGHT ? '' : message.author}</p>
        <p class="message-date">${message.date}</p>
      </div>
      <p class = "message-content">${message.content}</p>
    </div>
  `;
};

const displayMessages = () => {
  const messagesHTML = messages
    .map( (message) => createMessageHTML(message))
    .join('');
  messagesList.innerHTML = messagesHTML;
}

sendButton.addEventListener('click', (e) => {
  e.preventDefault();
  if(!messageInput.value){
    return console.log('Trebuie sa scrieti un mesaj');
  }

  const date = new Date();
  const day = date.getDate();
  const year = date.getFullYear();
  const month = ('0' + (date.getMonth()+1)).slice(-2);
  const dateString = `${day}/${month}/${year}`;

  const currentMessage = {
    author: username,
    date: dateString,
    content: messageInput.value
  }
  sendMessage(currentMessage);
  messageInput.value = '';
});

const sendMessage = message => {
  socket.emit('message', message);
}

loginButton.addEventListener('click', e => {
  //prevenire default
  e.preventDefault();
  //setare username si afisare mesaj autentificare
  if(!usernameInput.value){
    return console.log('Trebuie nume de utilizator');
  }
  username = usernameInput.value;
  sendMessage({
    author: username,
    type: tipMesaj.LOGIN
  });

  
  //ascundere autentificare si afisare chat
  loginWindow.classList.add('hidden');
  chatWindow.classList.remove('hidden');

  displayMessages();

})
