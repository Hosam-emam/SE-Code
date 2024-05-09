<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Class Example</title>
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
        // Define the Chat class and its methods
class Chat {
    constructor(chat_ID) {
        this.chat_ID = chat_ID;
    }

    chooseChat(contact) {
        // Placeholder logic for choosing a chat
        console.log(Chose chat with ${contact});
    }
}

// Create an instance of the Chat class
const chat = new Chat(1);

// Function to handle button clicks
function chooseChat(contact) {
    chat.chooseChat(contact);
    alert(Chose chat with ${contact});
}

    </script>
</head>
<body>
    <div class="container">
        <h1>Chat</h1>
        <button onclick="chooseChat('Alice')">Choose Chat with Alice</button>
        <button onclick="chooseChat('Bob')">Choose Chat with Bob</button>
        <button onclick="chooseChat('Charlie')">Choose Chat with Charlie</button>
    </div>
    
</body>
</html>