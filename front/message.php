<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message Class Example</title>
    <link rel="stylesheet" href="styles.css">
    <style>
body {
    font-family: Arial, sans-serif;
}

.container {
    max-width: 600px;
    margin: 20px auto;
    text-align: center;
}

button {
    padding: 10px 20px;
    margin: 10px;
    cursor: pointer;
}

    </style>
    <script src="script.js">
        // Define the Message class and its methods
class Message {
    constructor() {
        this.messages = [];
    }

    voiceMessage() {
        // Placeholder logic for sending voice message
        console.log('Voice message sent');
        this.messages.push({ type: 'voice', content: 'Voice message' });
    }

    Message(message) {
        // Placeholder logic for sending text message
        console.log(Message sent: ${message});
        this.messages.push({ type: 'text', content: message });
    }

    deleteMessage(message) {
        // Placeholder logic for deleting a message
        const index = this.messages.findIndex(msg => msg.content === message);
        if (index !== -1) {
            this.messages.splice(index, 1);
            console.log(Message deleted: ${message});
            return true;
        } else {
            console.log(Message '${message}' not found);
            return false;
        }
    }
}

// Create an instance of the Message class
const message = new Message();

// Functions to handle button clicks
function sendVoiceMessage() {
    message.voiceMessage();
    alert('Voice message sent');
}

function sendMessage(message) {
    message.Message(message);
    alert(Message sent: ${message});
}

function deleteMessage(message) {
    const deleted = message.deleteMessage(message);
    if (deleted) {
        alert(Message deleted: ${message});
    } else {
        alert(Message '${message}' not found);
    }
}

    </script>
</head>
<body>
    <div class="container">
        <h1>Message </h1>
        <button onclick="sendVoiceMessage()">Send Voice Message</button>
        <button onclick="sendMessage('Hello!')">Send Message</button>
        <button onclick="deleteMessage('Hello!')">Delete Message</button>
    </div>
    
</body>
</html>